<?php

namespace App\Http\Controllers\Admin;

use App\category;
use App\csv_file;
use App\Exports\productExport;
use App\Exports\ProductScheduleExport;
use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use App\Imports\ProductCollection;
use App\Imports\productImport;
use App\Imports\ProductScheduleCollection;
use App\Imports\ProductScheduleImport;
use App\order;
use App\product;
use App\product_schedule;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    public function products()
    {

        return view('admin.products.products');
    }

    public function impost_csv(Request $request)
    {
        $this->validate($request,[
            'csv_file'=>'required',
            'action'=>'required|not_in:0'
        ],[
            'csv_file.required'=>'Please Add CSV File',
            'action.required|not_in:0'=>'Please Add CSV File',
        ]);

        $action = $request->action;
        if ($action == 1) {

            Excel::import(new productImport(),$request->file('csv_file'));
            return back()->with('success','Product Import Successfully');

            }else{

            Excel::import(new ProductCollection(),$request->file('csv_file'));
            return back()->with('success','Product Updated Successfully');
        }

    }

    public function product_get()
    {
        $product =product::latest('id');
        return DataTables::of($product)
            ->addColumn('action', function ($product) {
                return ' <a href="'.route('product.edit',$product->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                        <button id="'.$product->id.'" onclick="deleteproductsingle(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletesinglepro"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function export_csv()
    {
        return Excel::download(new productExport(), 'product.csv');
    }

    public function delete(Request $request)
    {
        $product = product::query()->delete();

        return back();
    }


    public function products_schedule()
    {
        return view('admin.products.productsSchedule');
    }


    public function products_schedule_get()
    {
        $product_schedule =product_schedule::latest('id');
        return DataTables::of($product_schedule)
            ->addColumn('action', function ($product_schedule) {
//                return ' <a href=""> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
//                        <button id="" onclick="deleteuser(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteuser"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function products_schedule_save(Request $request)
    {
        $this->validate($request,[
            'csv_file'=>'required',
            'action'=>'required|not_in:0'
        ],[
            'csv_file.required'=>'Please Add CSV File',
            'action.required|not_in:0'=>'Please Add CSV File',
        ]);

        $action = $request->action;

        if ($action == 1)
        {
            Excel::import(new ProductScheduleImport(),$request->file('csv_file'));
            return back()->with('success','Product Schedule Import Successfully');
        }else{
            Excel::import(new ProductScheduleCollection(),$request->file('csv_file'));

            return back()->with('success','Product Schedule Updated Successfully');
        }


    }

    public function products_schedule_export()
    {
        return Excel::download(new ProductScheduleExport(), 'productSchedule.csv');
    }


    public function create_product()
    {
        $schedule = product_schedule::distinct()->select('schedule_name')->get();
        $category = category::all();
        return view('admin.products.productCreate',compact('schedule','category'));
    }

    public function create_product_save(Request $request)
    {
        $product = new product();
        if($request->hasFile('product_image')){
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalName('product_image');
            $directory = 'assets/admin/images/productImage/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $product->product_image = $imgUrl;
        }

        $product->product_name = $request->product_name;
        $product->long_description = $request->long_description;
        $product->short_description = $request->short_description;
        $product->category = $request->category;
        $product->tags = $request->tags;
        $product->schedule_name = $request->schedule_name;
        $product->save();

        return back()->with('success','Product Create Successfull');



    }

    public function edit_product($id)
    {
        $schedule = product_schedule::distinct()->select('schedule_name')->get();
        $pro = product::where('id',$id)->first();
        $category = category::all();
        return view('admin.products.productEdit',compact('schedule','pro','category'));
    }

    public function create_product_update(Request $request)
    {
        $pro_up = product::where('id',$request->product_name_edit)->first();
        if($request->hasFile('product_image')){
            @unlink($pro_up->product_image);
            $image = $request->file('product_image');
            $imageName = time().'.'.$image->getClientOriginalName('product_image');
            $directory = 'assets/admin/images/productImage/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $pro_up->product_image = $imgUrl;
        }

        $pro_up->product_name = $request->product_name;
        $pro_up->long_description = $request->long_description;
        $pro_up->short_description = $request->short_description;
        $pro_up->category = $request->category;
        $pro_up->tags = $request->tags;
        $pro_up->schedule_name = $request->schedule_name;
        $pro_up->save();

        return back()->with('success','Product Updated Successfully');
    }


    public function create_product_delete(Request $request)
    {
        $del_pro = product::where('id',$request->single_product_delte_id)->first();
        @unlink($del_pro->product_image);
        $del_pro->delete();
        return back()->with('success','Product Deleted Successfully');

    }

    public function product_ctegory()
    {
        return view('admin.products.productCategory');
    }

    public function product_ctegory_get()
    {
        $category =category::latest('id');
        return DataTables::of($category)
            ->addColumn('action', function ($category) {
                return '  <button id="'.$category->id.'" onclick="editsinglecat(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#editcategory"><i class="fas fa-eye"></i> </button>
                        <button id="'.$category->id.'" onclick="deletesingcat(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deletecategory"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }

    public function product_ctegory_save(Request $request)
    {
        $cate = new category();
        $cate->category_name = $request->category_name;
        $cate->save();

        return back()->with('success','Product Category Created');
    }

    public function product_ctegory_single(Request $request)
    {
        $single_cat = category::where('id',$request->id)->first();
        return response($single_cat);
    }

    public function product_ctegory_update(Request $request)
    {
        $cat_update = category::where('id',$request->category_edit_id)->first();
        $cat_update->category_name = $request->category_name;
        $cat_update->save();

        return back()->with('success','Product Category Updated');
    }

    public function product_ctegory_delete(Request $request)
    {
        $del_cat = category::where('id',$request->category_delete_id)->first();
        $del_cat->delete();
        return back()->with('success','Product Category Deleted');
    }


    public function new_order()
    {
        $user_order = order::orderBy('id','desc')->where('order_status',0)->paginate(15);
        return view('admin.order.newOrder',compact('user_order'));
    }

    public function napproved_order()
    {
        $user_order = order::orderBy('id','desc')->where('order_status',1)->paginate(15);
        return view('admin.order.approvedOrder',compact('user_order'));
    }

    public function delivered_order()
    {
        $user_order = order::orderBy('id','desc')->where('order_status',2)->paginate(15);
        return view('admin.order.deleiverOrder',compact('user_order'));
    }

    public function calcel_order()
    {
        $user_order = order::orderBy('id','desc')->where('order_status',3)->paginate(15);
        return view('admin.order.cancelOrder',compact('user_order'));
    }


    public function new_order_details($id)
    {
        $user_order = order::where('id',$id)->first();
        return view('admin.order.newOrderDetails',compact('user_order'));
    }



    public function order_save(Request $request)
    {
        $status = $request->status;
        if ($status == 0)
        {
            $order_save = order::where('id',$request->orderid)->first();
            $order_save->order_status = $request->status;
            $order_save->save();
            return back()->with('success','Order Pending');
        }else if ($status == 1){
            $order_save = order::where('id',$request->orderid)->first();
            $order_save->order_status = $request->status;
            $order_save->save();
            return back()->with('success','Order Approved');
        }
        else if ($status == 2){
            $order_save = order::where('id',$request->orderid)->first();
            $order_save->order_status = $request->status;
            $order_save->save();
            return back()->with('success','Order Delivered');
        }
        else{
            $order_save = order::where('id',$request->orderid)->first();
            $order_save->order_status = $request->status;
            $order_save->save();
            return back()->with('success','Order Canceled');
        }
    }


}
