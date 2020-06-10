<?php

namespace App\Http\Controllers;

use App\product;
use App\product_schedule;
use App\slider;
use App\static_data;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use function PHPUnit\Framework\StaticAnalysis\HappyPath\AssertIsArray\consume;

class FrontendController extends Controller
{
    public function index()
    {
        $slider = slider::all();
        $poduct_random = product::inRandomOrder()->limit(20)->orderBy('id','desc')->get();
        $product = product::inRandomOrder()->limit(15)->get();
        $static = static_data::first();
        return view('frontend.index',compact('slider','poduct_random','product','static'));
    }



    public function shop()
    {

        $product = product::orderBy('product_name')->paginate(20);
        $resent_produt = product::inRandomOrder()->limit(3)->orderBy('product_name')->get();
        return view('frontend.shop',compact('product','resent_produt'));
    }

    public function get_product(Request $request)
    {
        $query="SELECT * FROM products ORDER BY 'product_name' ";
        $query_exe = DB::select($query);

        $product = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices'=> $product,
            'view' =>View::make('frontend.include.productSingle',compact('product'))->render(),
            'pagination'=> (string) $product->links()
        ]);
    }

    public function get_product_get(Request $request)
    {
        $query="SELECT * FROM products ORDER BY 'product_name' ";
        $query_exe = DB::select($query);

        $product = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices'=> $product,
            'view' =>View::make('frontend.include.productSingle',compact('product'))->render(),
            'pagination'=> (string) $product->links()
        ]);
    }


    public function get_product_by_name(Request $request)
    {
        $name = $request->name;
        $query="SELECT * FROM products WHERE product_name LIKE '%$name%' ";

        $query_exe =  DB::select($query);

        $product = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices'=> $product,
            'view' =>View::make('frontend.include.productSingle',compact('product'))->render(),
            'pagination'=> (string) $product->links()
        ]);
    }

    public function get_product_by_name_get(Request $request)
    {
        $name = $request->name;
        $query="SELECT * FROM products WHERE product_name LIKE '%$name%' ";

        $query_exe =  DB::select($query);

        $product = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices'=> $product,
            'view' =>View::make('frontend.include.productSingle',compact('product'))->render(),
            'pagination'=> (string) $product->links()
        ]);
    }


    public function get_product_by_category(Request $request)
    {
        $cat = $request->catagory;

        $query="SELECT * FROM products  WHERE category is not null  ";


        if (empty($cat)){
            $query .= 'ORDER BY  product_name ';
            $query_exe = DB::select($query);
        }

        if (isset($cat))
        {
            $CAT_filter = implode("','", $cat);
            $query .= "AND category IN ('".$CAT_filter."') ";
            $query .= 'ORDER BY  product_name ';
            $query_exe = DB::select($query);

        }


        $product = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices'=> $product,
            'view' =>View::make('frontend.include.productSingle',compact('product'))->render(),
            'pagination'=> (string) $product->links()
        ]);

    }

    public function get_product_by_category_get(Request $request)
    {
        $cat = $request->catagory;
        $query="SELECT * FROM products  WHERE category is not null  ";

        if (empty($cat)){
            $query .= ' ORDER BY  product_name ';
            $query_exe = DB::select($query);
        }

        if (isset($cat))
        {
            $CAT_filter = implode("','", $cat);
            $query .= "AND category IN ('".$CAT_filter."') ";
            $query .= ' ORDER BY  product_name ';
            $query_exe = DB::select($query);

        }


        $product = $this->arrayPaginator($query_exe, $request);
        return response()->json([
            'notices'=> $product,
            'view' =>View::make('frontend.include.productSingle',compact('product'))->render(),
            'pagination'=> (string) $product->links()
        ]);
    }



    public function categories()
    {
        $product = product::paginate(20);
        $resent_produt = product::inRandomOrder()->limit(3)->get();
        return view('frontend.categories',compact('product','resent_produt'));
    }



    public function arrayPaginator($array, $request)
    {
        $page = $request->input('page', 1);
        $perPage = 20;
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);

    }


    public function product_details($name)
    {
        $product_details = product::where('id',$name)->first();


        return view('frontend.productDetails',compact('product_details'));
    }

    public function category_product($cat)
    {
        $id = $cat;
        $cat_pro = product::where('id',$id)->first();
        $product = product::where('category',$cat)->paginate(20);
        $resent_produt = product::inRandomOrder()->limit(3)->get();
        return view('frontend.categoryProduct',compact('id','product','resent_produt','cat_pro'));
    }

    public function product_price_get(Request $request)
    {
        $product_price = product_schedule::where('schedule_name',$request->schedule)
            ->where('width',$request->width)
            ->where('length',$request->length)
            ->where('category_name',$request->catname)
            ->first();
        return response($product_price);
    }

    public function add_to_cart(Request $request)
    {
        $product_id = $request->product_id;

        $product_qty = $request->qty;

        $product = product::where('id',$product_id)->first();


        $price = $request->price;

        $data['qty'] = $product_qty;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['price'] = $price;
        $data['weight'] = 550;
        $data['options']['image'] = $product->product_image;
        $data['options']['blinds1'] = $request->blinds1 == "" ? 0.00 : $request->blinds1;
        $data['options']['blinds2'] = $request->blinds2 == "" ? 0.00 : $request->blinds2;
        $data['options']['blinds3'] = $request->blinds3 == "" ? 0.00 : $request->blinds3;
        $data['options']['witdhtside'] = $request->witdhtside;
        $data['options']['legthside'] = $request->legthside;


        Cart::add($data);
        return back();
    }

    public function view_cart()
    {
        return view('frontend.viewCart');
    }

    public function cart_update(Request $request)
    {
        $rowId  = $request->rowid;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
        return back();
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return back();
    }

    public function cart_frm_delete(Request $request)
    {

        $id = $request->rowid;
        Cart::remove($id);
        return back();
    }


    public function about_us()
    {
        $abputus = static_data::first();
        return view('frontend.aboutus',compact('abputus'));
    }

    public function contact_us()
    {
        return view('frontend.contactus');
    }

    public function category_product_data($name)
    {
        return $name;

//        $id = $name;
//        $product = product::where('id',$name)->paginate(20);
//        $resent_produt = product::inRandomOrder()->limit(3)->get();
//        return view('frontend.categoryProduct',compact('name','product','resent_produt'));
    }
}
