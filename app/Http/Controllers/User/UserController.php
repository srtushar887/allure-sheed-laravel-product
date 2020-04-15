<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\order;
use App\order_product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function billing_addres()
    {
        return view('user.billingAddress');
    }

    public function myorder()
    {
        $myorders = order::where('user_id',Auth::user()->id)->paginate(15);
        return view('user.myOrder',compact('myorders'));
    }

    public function myorder_details($id){
        $order_details = order::where('id',$id)->first();
        return view('user.myOrderDeyails',compact('order_details'));
    }

    public function billing_address()
    {
        $bill = User::where('id',Auth::user()->id)->first();
        return view('user.billingAddress',compact('bill'));
    }

    public function billing_address_save(Request $request)
    {
        $my_bill = User::where('id',Auth::user()->id)->first();
        $my_bill->address = $request->address;
        $my_bill->country = $request->country;
        $my_bill->town_city = $request->town_city;
        $my_bill->state = $request->state;
        $my_bill->zip_code = $request->zip_code;
        $my_bill->save();

        return back()->with('bill_save','Billing Address Updated');
    }

    public function my_profile()
    {
        $pro =User::where('id',Auth::user()->id)->first();
        return view('user.myProfile',compact('pro'));
    }

    public function my_profile_save(Request $request)
    {
        $my_profile = User::where('id',Auth::user()->id)->first();
        $my_profile->first_name = $request->first_name;
        $my_profile->last_name = $request->last_name;
        $my_profile->email = $request->email;
        $my_profile->phone = $request->phone;
        $my_profile->save();
        return back()->with('profile_save','Profile Updated');
    }

    public function change_password()
    {
        return view('user.changePass');
    }

    public function change_password_save(Request $request)
    {
        $newpass = $request->new_pass;
        $cpass = $request->c_pass;

        if ($newpass != $cpass){
            return back()->with('alert_pass','Password Not Match');
        }else{
            $admin_pass = User::where('id',Auth::user()->id)->first();
            $admin_pass->password = Hash::make($newpass);
            $admin_pass->save();

            return back()->with('save_pass','Password Changed Successfully');
        }
    }


    public function checkout()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('user.checkout',compact('user'));
    }

    public function stripe_pay(Request $request)
    {


        $this->validate($request,[
            'address'=>'required',
            'town_city'=>'required',
            'state'=>'required',
            'zip_code'=>'required',
        ],[
            'address.required' => 'Please Enter Address',
            'town_city.required' => 'Please Enter Town/City Name',
            'state.required' => 'Please Enter State',
            'zip_code.required' => 'Please Enter Zip Code',
        ]);

//       return  Cart::total() ;
        \Stripe\Stripe::setVerifySslCerts(false);
        \Stripe\Stripe::setApiKey('sk_test_Rc3ItpcRMziLqT8XyLO0qesh00RYg0WFJi');

         $price = $request->total_price;
         $b = str_replace( ',', '', $price );

        $token =  $request->stripeToken;
        $charge = \Stripe\Charge::create([
            'amount' => $b * 100 ,
            'currency' => 'usd',
            'source' => $token,
        ]);

        if($charge['status'] == 'succeeded'){

            $order = new order();
            $order->user_id = Auth::user()->id;
            $order->order_id = Auth::user()->id.rand(000000,999999);
            $order->payment_type = "Card Payment";
            $order->order_total = $request->total_price;
            $order->order_status = 0;

            if ($order->save()){
                $cards = Cart::content();
                foreach ($cards as $card){
                    $order_product = new order_product();
                    $order_product->order_id = $order->id;
                    $order_product->product_id = $card->id;
                    $order_product->product_price = $card->price;
                    $order_product->qty = $card->qty;
                    $order_product->blinds1 = $card->options->blinds1;
                    $order_product->blinds2 = $card->options->blinds2;
                    $order_product->blinds3 = $card->options->blinds3;
                    $order_product->witdhtside = $card->options->witdhtside;
                    $order_product->legthside = $card->options->legthside;
                    $order_product->save();

                }
            }

            return redirect(route('myorder'))->with('product_success','Product Order Successfully');

        }else{
            return back()->with('product_cart_error','Product Order Successfully');
        }

    }


    public function stripe_payal_save(Request $request)
    {
        $order = new order();
        $order->user_id = Auth::user()->id;
        $order->order_id = Auth::user()->id.rand(000000,999999);
        $order->payment_type = "Paypal Payment";
        $order->order_total = $request->total_price;
        $order->order_status = 0;

        if ($order->save()){
            $cards = Cart::content();
            foreach ($cards as $card){
                $order_product = new order_product();
                $order_product->order_id = $order->id;
                $order_product->product_id = $card->id;
                $order_product->product_price = $card->price;
                $order_product->qty = $card->qty;
                $order_product->blinds1 = $card->options->blinds1;
                $order_product->blinds2 = $card->options->blinds2;
                $order_product->blinds3 = $card->options->blinds3;
                $order_product->witdhtside = $card->options->witdhtside;
                $order_product->legthside = $card->options->legthside;
                $order_product->save();

            }
        }
    }

}
