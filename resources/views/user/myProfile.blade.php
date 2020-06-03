@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">My Account</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">My Account</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>

    <div class="my-account-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            @include('user.include.menu')
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-12 col-md-12">
                            <br>
                            @if (Session::has('profile_save'))
                                <h3 class="text-center">{{Session::get('profile_save')}}</h3>
                            @endif
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Profile</h3>
                                        <div class="account-details-form">
                                            <form action="{{route('my.profile.save')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">First Name</label>
                                                            <input type="text" name="first_name" value="{{$pro->first_name}}" id="first-name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Last Name</label>
                                                            <input type="text" name="last_name" value="{{$pro->last_name}}" id="last-name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Email Addres</label>
                                                    <input type="email" name="email" value="{{$pro->email}}" id="email">
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Phone</label>
                                                    <input type="text" name="phone" value="{{$pro->phone}}" id="email">
                                                </div>
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn ">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
