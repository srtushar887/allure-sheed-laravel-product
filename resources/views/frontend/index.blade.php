@extends('layouts.frontend')

@section('front')

    <!--=============================================
=            slider area         =
=============================================-->


    <div class="slider-area mb-30">
        <!--=======  slider-wrapper  =======-->

        <div class="lezada-slick-slider lezada-slick-slider--fullscreen"
             data-slick-setting='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "arrows": true,
            "dots": true,
            "autoplay": false,
            "autoplaySpeed": 5000,
            "speed": 1000,
            "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
            "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
        }'
        >


            <!--=======  single slider  =======-->
            @foreach($slider as $slid)
                <div class="lezada-single-slider bg-img" data-bg="{{asset($slid->image)}}" style="width: 100%;height: 100%">
                    <div class="container h-100">
                        <div class="row text-center justify-content-center align-items-center h-100">
                            <div class="lezada-single-slider__content">
                                <h2 class="main-title">{{$slid->title}}</h2>
                                <a href="{{route('shop')}}" class="lezada-button lezada-button--medium">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach

        <!--=======  End of single slider  =======-->

            <!--=======  single slider  =======-->

            <!--=======  End of single slider  =======-->


        </div>

        <!--=======  End of slider-wrapper  =======-->
    </div>

    <!--=====  End of slider area  ======-->


    <!--=============================================
    =            product category container two         =
    =============================================-->

    <div class="product-category-container mb-90 mb-md-70 mb-sm-55">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product category wrapper  =======-->

                    <div class="lezada-slick-slider product-category-slider"

                         data-slick-setting='{
						"slidesToShow": 3,
						"arrows": true,
						"autoplay": true,
						"autoplaySpeed": 5000,
						"speed": 1000,
						"prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-thin-left" },
						"nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-thin-right" }
					}'
                         data-slick-responsive='[
						{"breakpoint":1501, "settings": {"slidesToShow": 3} },
						{"breakpoint":1199, "settings": {"slidesToShow": 3} },
						{"breakpoint":991, "settings": {"slidesToShow": 2, "arrows": false} },
						{"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
						{"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
						{"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
					]'

                    >
                        @foreach($poduct_random as $proram)
                        <div class="col">
                            <!--=======  single category  =======-->

                            <div class="single-category single-category--two">
                                <!--=======  single category image  =======-->

                                <div class="single-category__image single-category__image--two">
                                    <img src="{{asset($proram->product_image)}}" style="height: 200px;" class="img-fluid" alt="">
                                </div>

                                <!--=======  End of single category image  =======-->

                                <!--=======  single category content  =======-->

                                <div class="single-category__content single-category__content--two mt-25">
                                    <div class="title">
                                        <a href="{{route('product.view',$proram->id)}}">{{$proram->product_name}}</a>
                                    </div>
                                    <?php
                                    $min_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$proram->schedule_name)->min('regular_price');
                                    $max_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$proram->schedule_name)->max('regular_price');
                                    ?>
                                    <p class="product">${{$min_amount}}</p> -
                                    <p class="product">${{$max_amount}}</p>
                                </div>

                                <!--=======  End of single category content  =======-->


                                <!--=======  banner-link  =======-->

                                <a href="{{route('product.view',$proram->id)}}" class="banner-link"></a>

                                <!--=======  End of banner-link  =======-->
                            </div>

                            <!--=======  End of single category  =======-->
                        </div>
                            @endforeach

                    </div>

                    <!--=======  End of product category wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of product category container two  ======-->



    <div class="section-title-container mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <!--=======  section title  =======-->

                    <div class="section-title section-title--one text-center">

                        <h1>{{$static->home_static_one_title}}</h1>
                        <p class="subtitle subtitle--deep mb-0">{{$static->home_static_one_sub_title}}</p>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>
        </div>
    </div>


    <div class="about-page-content mb-100 mb-sm-45">
        <div class="container wide">

            <div class="row">

                <div class="col-lg-6 mb-md-50 mb-sm-50">
                    <!--=======  about page 2 image  =======-->

                    <div class="about-page-2-image">
                        <img src="{{asset($static->home_static_one_image)}}" class="img-fluid" alt="">
                    </div>

                    <!--=======  End of about page 2 image  =======-->
                </div>

                <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-6 mb-sm-50">

                    <div class="about-page-text">
                        <p class=" mb-35">{!! $static->home_static_one_des !!}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <!--=============================================
    =            section title  container      =
    =============================================-->

    <div class="section-title-container mb-80 mb-md-60 mb-sm-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title section-title--one text-center">
                        <h1>Our Products</h1>
                        <p class="subtitle subtitle--deep subtitle--trending-home">Find your style. Fall fashion 20xx</p>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of section title container ======-->

    <!--=============================================
    =            product carousel container         =
    =============================================-->

    <div class="product-carousel-container mb-70 mb-md-50 mb-sm-30">
        <div class="container wide">
            <div class="row column-five product">

                <!--=======  single product  =======-->
                @include('frontend.include.homepageproduct')
                <!--=======  End of single product  =======-->


            </div>

            <div class="row">
                <div class="col-lg-12 text-center mb-25 mt-30 mt-sm-20">
                    <a class="lezada-loadmore-button" href="{{route('shop')}}"><i class="ion-ios-plus-empty"></i> VIEW MORE ...</a>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of product carousel container  ======-->




    <div class="section-title-container mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <!--=======  section title  =======-->

                    <div class="section-title section-title--one text-center">

                        <h1>{{$static->home_static_two_title}}</h1>
                        <p class="subtitle">{!! $static->home_static_two_sort_des !!}</p>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>
        </div>
    </div>


    <div class="about-video-content mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <!--=======  about video area  =======-->

                    <div class="about-video-bg-area about-video-bg-2 pt-300 pb-300 pt-sm-200 pb-sm-200  pt-xs-150 pb-xs-150  mb-50" style="background-image: url({{asset($static->home_static_two_image)}})">
                        <!--=======  floating-text left  =======-->



                        <!--=======  End of floating-text left  =======-->
                        <div class="play-icon text-center mb-40">
                            <a href="https://www.youtube.com/watch?v=feOScd2HdiU" class="popup-video">
                                <img src="assets/images/icons/icon-play-100x100.png" class="img-fluid" alt="">
                            </a>
                        </div>
                        <h1>OUR STORY</h1>

                        <!--=======  floating-text right  =======-->



                        <!--=======  End of floating-text right  =======-->

                    </div>

                    <!--=======  End of about video area  =======-->
                </div>


            </div>

            <div class="row">


                <div class="col-lg-10 offset-lg-1 col-md-6">
                    <!--=======  about page content  =======-->

                    <div class="about-page-text">
                        <p class=" mb-35">{!! $static->home_static_two_long_des !!}</p>

                        <a href="{{route('shop')}}" class="lezada-button lezada-button--medium lezada-button--icon--left"> <i class="icon-left ion-plus"></i> Shop Now</a>
                    </div>

                    <!--=======  End of about page content  =======-->
                </div>

            </div>
        </div>
    </div>


    <!--=============================================
    =            section title  container      =
    =============================================-->

    <div class="section-title-container mb-80 mb-md-60 mb-sm-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title section-title--one text-center">
                        <h1><a href="https://www.instagram.com/lezada_shop/">@lezada_shop</a></h1>
                        <p class="subtitle subtitle--deep subtitle--trending-home">Follow us on instagram</p>

                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of section title container ======-->


    <!--=============================================
    =            instagram image slider         =
    =============================================-->

    <div class="instagram-image-slider-area mb-50 mb-md-70">

        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  instagram image container  =======-->

                    <div class="instagram-image-slider-container">
                        <div class="instagram-feed-thumb">
                            <div id="instafeed2" class="instagram-carousel-type2" data-userid2="6666969077" data-accesstoken2="6666969077.1677ed0.d325f406d94c4dfab939137c5c2cc6c2">
                            </div>
                        </div>
                    </div>

                    <!--=======  End of instagram image container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of instagram image slider  ======-->

@stop

@section('js')

@stop

