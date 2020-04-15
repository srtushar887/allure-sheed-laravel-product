<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\slider;
use App\static_data;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminFrontendController extends Controller
{
    public function slider()
    {
        $slider = slider::all();
        return view('admin.frontend.slider',compact('slider'));
    }

    public function slider_save(Request $request)
    {
        $slider = new slider();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/admin/images/slider/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $slider->image = $imgUrl;
        }

        $slider->title = $request->title;
        $slider->sib_title = $request->sib_title;
        $slider->save();
        return back()->with('success','Slider Created');
    }

    public function slider_update(Request $request)
    {
        $slider_update = slider::where('id',$request->slider_edit_id)->first();
        if($request->hasFile('image')){
            @unlink($slider_update->image);
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/admin/images/slider/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $slider_update->image = $imgUrl;
        }
        $slider_update->title = $request->title;
        $slider_update->sib_title = $request->sib_title;
        $slider_update->save();
        return back()->with('success','Slider Updated');
    }

    public function slider_delete(Request $request)
    {
        $slider = slider::where('id',$request->slider_delete_id)->first();
        @unlink($slider->image);
        $slider->delete();
        return back()->with('success','Slider Deleted');
    }

    public function about_us()
    {
        $about = static_data::first();
        return view('admin.frontend.aboutUs',compact('about'));
    }

    public function about_us_save(Request $request)
    {
        $about_us = static_data::first();
        $about_us->about_us_title = $request->about_us_title;
        $about_us->about_us_title_des = $request->about_us_title_des;
        $about_us->save();

        return back()->with('success','About Us Updated');
    }

    public function home_static_one()
    {
        $home_static_one = static_data::first();
        return view('admin.frontend.homeStaticOne',compact('home_static_one'));
    }

    public function home_static_one_save(Request $request)
    {
        $home_static_one = static_data::first();
        if($request->hasFile('home_static_one_image')){
            @unlink($home_static_one->home_static_one_image);
            $image = $request->file('home_static_one_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('home_static_one_image');
            $directory = 'assets/admin/images/static/';
            $imgUrl4  = $directory.$imageName;
            Image::make($image)->save($imgUrl4);
            $home_static_one->home_static_one_image = $imgUrl4;
        }
        $home_static_one->home_static_one_title = $request->home_static_one_title;
        $home_static_one->home_static_one_sub_title = $request->home_static_one_sub_title;
        $home_static_one->home_static_one_des = $request->home_static_one_des;
        $home_static_one->save();

        return back()->with('success','Home Static One Updated');


    }

    public function home_static_two()
    {
        $home_static_two = static_data::first();
        return view('admin.frontend.homeStaticTwo',compact('home_static_two'));
    }

    public function home_static_two_save(Request $request)
    {
        $home_static_two = static_data::first();
        if($request->hasFile('home_static_two_image')){
            @unlink($home_static_two->home_static_two_image);
            $image = $request->file('home_static_two_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('home_static_two_image');
            $directory = 'assets/admin/images/static/';
            $imgUrl4  = $directory.$imageName;
            Image::make($image)->save($imgUrl4);
            $home_static_two->home_static_two_image = $imgUrl4;
        }
        $home_static_two->home_static_two_title = $request->home_static_two_title;
        $home_static_two->home_static_two_sort_des = $request->home_static_two_sort_des;
        $home_static_two->home_static_two_long_des = $request->home_static_two_long_des;
        $home_static_two->save();

        return back()->with('success','Home Static Two Updated');
    }

}
