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


                <form action="{{route('admin.product.discount.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="userName">Product Category<span class="text-danger">*</span></label>
                            <select class="form-control categoryname" name="category">
                                <option value="">select any</option>
                                @foreach($category as $cat)
                                    <option value="{{$cat->category_name}}" {{$dis->category == $cat->category_name ? 'selected' : ''}}>{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--                        <div class="form-group col-md-4">--}}
                        {{--                            <label for="userName">Product Schedule<span class="text-danger">*</span></label>--}}
                        {{--                            <select class="form-control shcname" name="schedule_name[]" multiple disabled>--}}
                        {{--                                <option value="0">select any</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}
                        <div class="form-group col-md-6">
                            <label for="userName">Discount<span class="text-danger">*</span></label>
                            <input type="text" name="discount_price" value="{{$dis->discount_price}}" class="form-control" >
                            <input type="hidden" name="discount_price_edit_id" value="{{$dis->id}}" class="form-control" >
                        </div>



                    </div>


                    <div class="form-group text-left mb-0">
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
