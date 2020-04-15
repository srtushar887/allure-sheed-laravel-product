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
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  login title  =======-->

                                    <div class="section-title section-title--login text-center mb-50">
                                        <h2 class="mb-20">Login</h2>
                                        <p>Great to have you back!</p>
                                    </div>
                                    <!--=======  End of login title  =======-->
                                </div>
                                <div class="col-lg-6 mb-60">
                                    <input type="text" name="email" placeholder="email address" required="">
                                </div>
                                <div class="col-lg-6 mb-60">
                                    <input type="password" name="password" placeholder="Password" required="">
                                </div>
                                <div class="col-lg-12 text-center mb-30">
                                    <button class="lezada-button lezada-button--medium">login</button>
                                </div>

                                <div class="col-lg-12">
                                    <a href="#" class="reset-pass-link">Lost your password?</a>
                                    <a href="{{route('register')}}" class="reset-pass-link">Need an account? create account</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
