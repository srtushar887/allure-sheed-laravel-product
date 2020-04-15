@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Create Product</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">


                <form class="parsley-examples" action="{{route('admin.create.product.save')}}" method="post" novalidate="" enctype="multipart/form-data">
                    @csrf
                   <div class="row">
                       <div class="form-group col-md-6">
                           <label for="userName">Product Name<span class="text-danger">*</span></label>
                           <input type="text" name="product_name" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-6">
                           <label for="userName">Product Image<span class="text-danger">*</span></label>
                           <input type="file" name="product_image" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Product Long Description<span class="text-danger">*</span></label>
                           <textarea type="text" name="long_description" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName"></textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Product Sort Description<span class="text-danger">*</span></label>
                           <textarea type="text" name="short_description" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName"></textarea>
                       </div>
                       <div class="form-group col-md-4">
                           <label for="userName">Product Category<span class="text-danger">*</span></label>
                           <select class="form-control" name="category">
                               <option value="">select any</option>
                               @foreach($category as $cat)
                               <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                                   @endforeach
                           </select>
                       </div>
                       <div class="form-group col-md-4">
                           <label for="userName">Product Tags<span class="text-danger">*</span></label>
                           <input type="text" name="tags" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-4">
                           <label for="userName">Product Schedule<span class="text-danger">*</span></label>
                           <select class="form-control" name="schedule_name">
                               <option value="0">select any</option>
                               @foreach($schedule as $she)
                               <option value="{{$she->schedule_name}}">{{$she->schedule_name}}</option>
                                   @endforeach
                           </select>
                       </div>
                   </div>


                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->

    </div>



@stop
