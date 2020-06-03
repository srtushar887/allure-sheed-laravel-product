@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Update Product</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">


                <form  action="{{route('admin.update.product.save')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userName">Product Name<span class="text-danger">*</span></label>
                            <input type="text" name="product_name" value="{{$pro->product_name}}" parsley-trigger="change"  placeholder="Enter user name" class="form-control" id="userName">
                            <input type="hidden" name="product_name_edit" value="{{$pro->id}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Product Image<span class="text-danger">*</span></label>
                            <input type="file" name="product_image" parsley-trigger="change"  placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="userName">Product Long Description<span class="text-danger">*</span></label>
                            <textarea type="text" name="long_description" parsley-trigger="change" placeholder="Enter user name" class="form-control" id="userName">{!! $pro->long_description !!}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="userName">Product Sort Description<span class="text-danger">*</span></label>
                            <textarea type="text" name="short_description" parsley-trigger="change"  placeholder="Enter user name" class="form-control" id="userName">{!! $pro->short_description !!}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="category">
                                <option value="0">select any</option>
                                @foreach($category as $cat)
                                    <option value="{{$cat->category_name}}" {{$pro->category == $cat->category_name ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="userName">Product Tags<span class="text-danger">*</span></label>
                            <input type="text" name="tags" value="{{$pro->product_name}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Schedule<span class="text-danger">*</span></label>
                            <select class="form-control" name="schedule_name">
                                <option value="0">select any</option>
                                @foreach($schedule as $she)
                                    <option value="{{$she->schedule_name}}" {{$pro->schedule_name == $she->schedule_name ? 'selected' : ''}}>{{$she->schedule_name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-12">
                            <div class="row">
                                <?php
                                    $product_img = \App\product_color_image::where('product_id',$pro->id)->get();
                                ?>
                                @foreach($product_img as $proimg)
                                <div class="form-group col-md-4">
                                    <label for="userName">Color Name<span class="text-danger">*</span></label>
                                    <input type="text" name="color_name_exist[]" value="{{$proimg->color_name}}" class="form-control" readonly>
                                    <input type="hidden" name="color_name_edit_id[]" value="{{$proimg->id}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="userName">Color Image<span class="text-danger">*</span></label>
                                    <img src="{{asset('assets/admin/images/productcolorimage/'.$proimg->color_image)}}" style="height: 100px;width: 100px;">
                                </div>

                                <div class="form-group col-md-4" style="margin-top: 28px;">
                                    <a href="{{route('delete.product.color.img',$proimg->id)}}">
                                        <button class="btn btn-danger" type="button">Remove</button>
                                    </a>
                                </div>
                                    @endforeach
                                    <div class="form-group col-md-4" style="margin-top: 28px;">
                                        <button class="btn btn-success" type="button" id="addnewimage">add new image</button>
                                    </div>
                            </div>

                            <div class="col-md-12">
                                <div class="addnewrow"></div>
                            </div>


                    </div>


                    <div class="form-group text-right mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Update
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->

    </div>



@stop
@section('js')
    <script>
        $(document).ready(function () {
            $('#addnewimage').click(function (e) {
                e.preventDefault();
                $('.addnewrow').append(
                    `<div class="row remvrpdv">
                            <div class="form-group col-md-4">
                                 <label for="userName">Color Name<span class="text-danger">*</span></label>
                                 <input type="text" name="color_name[]" class="form-control" id="userName">
                             </div>
                              <div class="form-group col-md-4">
                                  <label for="userName">Color Image<span class="text-danger">*</span></label>
                                  <input type="file" name="filename[]" class="form-control" id="userName">
                              </div>
                                <div class="form-group col-md-4" style="margin-top: 28px;">
                                  <button class="btn btn-danger removeimgbtn" type="button">Remove</button>
                              </div>`

                );

                $('.removeimgbtn').click(function () {
                    console.log('paisi');
                    $(this).closest('.remvrpdv').remove();
                });


                $('#deletefromdbimg').click(function (e) {
                    e.preventDefault();

                    console.log('paisi');

                    var id = $(this).data('id');
                    console.log(id);


                })


            });


        })
    </script>
@stop
