<?php

namespace App\Http\Controllers\Admin;

use App\general_setting;
use App\Http\Controllers\Controller;
use App\order;
use App\product;
use App\product_schedule;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $total_schedule = product_schedule::count();
        $total_product = product::count();
        $total_new_order = order::where('order_status',0)->count();
        $total_approbed_order = order::where('order_status',1)->count();
        $total_deliver_order = order::where('order_status',2)->count();
        $total_cancel_order = order::where('order_status',3)->count();
        return view('admin.index',compact('total_schedule','total_product','total_new_order',
        'total_approbed_order','total_deliver_order','total_cancel_order'));
    }

    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.page.generalSettings',compact('gen'));
    }

    public function general_settings_update(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = time().'.'.$image->getClientOriginalName('logo');
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = time().'.'.$image->getClientOriginalName('icon');
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->icon = $imgUrl;
        }

        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->address = $request->address;
        $gen->save();

        return back()->with('success','General Settings Updated');
    }
}
