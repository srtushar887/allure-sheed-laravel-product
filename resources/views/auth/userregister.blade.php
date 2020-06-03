@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Customer login</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">customer login</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>


    <div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-md-50 mb-sm-50">
                    <div class="lezada-form login-form">
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  login title  =======-->

                                    <div class="section-title section-title--login text-center mb-50">
                                        <h2 class="mb-20">Register</h2>
                                        <p>Great to have you back!</p>
                                    </div>

                                    <!--=======  End of login title  =======-->
                                </div>
                                <div class="col-lg-6 mb-60">
                                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name" required="">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-60">
                                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" required="">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-60">
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" required="">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-60">
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-60">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-60">
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" required="">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 text-center mb-30">
                                    <button class="lezada-button lezada-button--medium">Register</button>
                                </div>

                                <div class="col-lg-12">
                                    <input type="checkbox"> <span class="remember-text">Remember me</span>
                                    <a href="#" class="reset-pass-link">Lost your password?</a>
                                    <a href="#" class="reset-pass-link">Lost your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
