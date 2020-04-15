@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb-area breadcrumb-bg-2 pt-50 pb-70 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">About Us</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">About Us</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>

    <div class="about-page-content mb-100 mb-sm-45">
        <div class="container wide">

            <div class="row">


                <div class="offset-xl-12 col-xl-12 col-lg-12 col-md-12 mb-sm-50">

                    <div class="about-page-text">
                        <h1>{{$abputus->about_us_title}}</h1>
                        <p class=" mb-35">{!! $abputus->about_us_title_des !!}</p>
                    </div>



                </div>
            </div>
        </div>
    </div>
@stop
