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


                <form action="{{route('admin.create.product.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="row">
                       <div class="form-group col-md-6">
                           <label for="userName">Product Name<span class="text-danger">*</span></label>
                           <input type="text" name="product_name"  class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-6">
                           <label for="userName">Product Image<span class="text-danger">*</span></label>
                           <input type="file" name="product_image" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Product Long Description<span class="text-danger">*</span></label>
                           <textarea type="text" name="long_description" class="form-control" id="userName"></textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Product Sort Description<span class="text-danger">*</span></label>
                           <textarea type="text" name="short_description"  class="form-control" id="userName"></textarea>
                       </div>
                       <div class="form-group col-md-4">
                           <label for="userName">Product Category<span class="text-danger">*</span></label>
                           <select class="form-control categoryname" name="category">
                               <option value="">select any</option>
                               @foreach($category as $cat)
                               <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                                   @endforeach
                           </select>
                       </div>
                       <div class="form-group col-md-4">
                           <label for="userName">Product Tags<span class="text-danger">*</span></label>
                           <input type="text" name="tags" class="form-control" >
                       </div>
                       <div class="form-group col-md-4">
                           <label for="userName">Product Schedule<span class="text-danger">*</span></label>
                           <select class="form-control shcname" name="schedule_name" disabled>
                               <option value="0">select any</option>
{{--                               @foreach($schedule as $she)--}}
{{--                                   <option value="{{$she->schedule_name}}">{{$she->schedule_name}}</option>--}}
{{--                               @endforeach--}}
                           </select>
                       </div>


                       <div class="col-md-12">
                          <div class="row">
                             <div class="form-group col-md-4">
                                 <label for="userName">Color Name<span class="text-danger">*</span></label>
                                 <input type="text" name="color_name[]" class="form-control">

                             </div>
                              <div class="form-group col-md-4">
                                  <label for="userName">Color Image<span class="text-danger">*</span></label>
                                  <input type="file" name="filename[]" class="form-control" >
                              </div>
                              <div class="form-group col-md-4" style="margin-top: 28px;">
                                  <button class="btn btn-success" type="button" id="addnewimage">Add New</button>
                              </div>
                          </div>




                       </div>
                       <div class="col-md-12">
                           <div class="addnewrow"></div>
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

            });



            $('.categoryname').change(function () {
                var catid = $(this).val();
                console.log(catid);

                $.ajax({
                    type : "POST",
                    url: "{{route('admin.get.schedule')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'catid' : catid,
                    },
                    success:function(data){

                        console.log(data)

                        if (data.length > 0){

                            $('.shcname').empty();
                            $.each(data,function (index,value) {
                                $('.shcname').append(
                                    `<option value="${value.schedule_name}">${value.schedule_name}</option>`
                                )
                            });

                            $(".shcname").prop("disabled", false);

                        }else {
                            $('.shcname').empty();

                            $('.shcname').append(
                                `<option value="0">No Schedule Available</option>`
                            );
                            $(".shcname").prop("disabled", true);


                        }

                    }
                });

            })



        })
    </script>
@stop
