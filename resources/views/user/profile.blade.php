@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">
                <form class="parsley-examples" action="{{route('user.profile.save')}}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userName">First Name<span class="text-danger">*</span></label>
                            <input type="text" name="first_name" value="{{Auth::user()->first_name}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Last name<span class="text-danger">*</span></label>
                            <input type="text" name="last_name" value="{{Auth::user()->last_name}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" value="{{Auth::user()->email}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" value="{{Auth::user()->phone}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="userName">Profile Image<span class="text-danger">*</span></label>
                            <br>
                            <img src="{{asset(Auth::user()->profile_image)}}" style="height: 100px;width: 100px">
                            <input type="file" name="profile_image"  parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
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
