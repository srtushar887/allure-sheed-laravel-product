@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">About Us</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.about.us.save')}}" method="post" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="userName">About Us Title<span class="text-danger">*</span></label>
                        <input type="text" name="about_us_title" value="{{$about->about_us_title}}" parsley-trigger="change" required=""  class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">About Us Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" id="summary-ckeditor-about" name="about_us_title_des">{!! $about->about_us_title_des !!}</textarea>
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
        CKEDITOR.replace( 'summary-ckeditor-about' );
    </script>
@stop
