@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Home Static One</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.home.static.two.save')}}" method="post" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="userName">Title<span class="text-danger">*</span></label>
                        <input type="text" name="home_static_two_title" value="{{$home_static_two->home_static_two_title}}" parsley-trigger="change" required=""  class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress"> Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" id="summary-ckeditor-sort" name="home_static_two_sort_des">{!! $home_static_two->home_static_two_sort_des !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="userName">Image<span class="text-danger">*</span></label>
                        <br>
                        <img src="{{asset($home_static_two->home_static_two_image)}}" style="height: 100px;width: 100px;">
                        <input type="file" name="home_static_two_image"  parsley-trigger="change" required=""  class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress"> Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" id="summary-ckeditor-long" name="home_static_two_long_des">{!! $home_static_two->home_static_two_long_des !!}</textarea>
                    </div>


                    <div class="form-group text-right mb-0">
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
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor-sort' );
        CKEDITOR.replace( 'summary-ckeditor-long' );
    </script>
@stop
