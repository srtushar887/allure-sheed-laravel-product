@extends('layouts.frontend')
@section('css')
    <style>


        .new {
            padding: 50px;
        }

        .form-group {
            display: block;
            margin-bottom: 15px;
        }

        .form-group input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
        }

        .form-group label {
            position: relative;
            cursor: pointer;
        }

        .form-group label:before {
            content:'';
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid #0079bf;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-right: 5px;
        }

        .form-group input:checked + label:after {
            content: '';
            display: block;
            position: absolute;
            top: 2px;
            left: 9px;
            width: 6px;
            height: 14px;
            border: solid #0079bf;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>
@stop
@section('front')
    <div class="breadcrumb-area breadcrumb-bg-2 pt-50 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Shop</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">PRODUCTS</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>



    <div class="shop-page-wrapper">

        <!--=======  shop page header  =======-->

        <div class="shop-page-header">
            <div class="container wide">
                <div class="row align-items-center">

                    <div class="col-12 col-lg-7 col-md-10 d-none d-md-block">
                        <!--=======  fitler titles  =======-->
                        <div class="filter-title filter-title--type-two">
                            <ul class="product-filter-menu">
                                <li class="active" data-filter = "*">All</li>
                            </ul>
                        </div>
                        <!--=======  End of fitler titles  =======-->
                    </div>

                    <div class="col-12 col-lg-5 col-md-2">
                        <!--=======  filter icons  =======-->

                        <div class="filter-icons">
                            <!--=======  filter dropdown  =======-->

                            <div class="single-icon filter-dropdown">
                                <select class="nice-select">
                                    <option value="0">Default sorting</option>
                                    <option value="1">Sort ny popularity</option>
                                    <option value="0">Sort by average rating</option>
                                    <option value="0">Sort by latest</option>
                                    <option value="0">Sort by price: low to high</option>
                                    <option value="0">Sort by price: high to low</option>
                                </select>
                            </div>

                            <!--=======  End of filter dropdown  =======-->

                            <!--=======  grid icons  =======-->



                            <!--=======  End of grid icons  =======-->

                            <!--=======  advance filter icon  =======-->

                            <div class="single-icon advance-filter-icon">
{{--                                <a href="javascript:void(0)" id="advance-filter-active-btn"><i class="ion-android-funnel"></i> Filters</a>--}}
                            </div>

                            <!--=======  End of advance filter icon  =======-->
                        </div>

                        <!--=======  End of filter icons  =======-->
                    </div>

                </div>
            </div>
        </div>

        <!--=======  End of shop page header  =======-->

        <!--=============================================
        =            shop advance filter area         =
        =============================================-->


        <!--=====  End of shop advance filter area  ======-->

        <!--=============================================
        =            shop page content         =
        =============================================-->

        <div class="shop-page-content mt-100 mb-100">
            <div class="container wide">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 order-2 order-lg-1">
                        <!--=======  page sidebar  =======-->

                        <div class="page-sidebar">
                            <!--=======  single sidebar widget  =======-->

                            <div class="single-sidebar-widget mb-40">
                                <!--=======  search widget  =======-->

                                <div class="search-widget">
                                    <form action="#">
                                        <input type="search" class="productname" placeholder="Search products ...">
                                        <button type="button"><i class="ion-android-search"></i></button>
                                    </form>
                                </div>

                                <!--=======  End of search widget  =======-->
                            </div>


                            <!--=======  End of single sidebarwidget  =======-->

                            <!--=======  single sidebar widget  =======-->

                            <div class="single-sidebar-widget mb-40">
                                <h2 class="single-sidebar-widget--title">Categories</h2>
                                <?php
                                    $categories = \App\product::distinct()->select('category')->get();
                                ?>
                                @foreach($categories as $cat)
                                <div class="form-group">
                                    <input type="checkbox" class="common_selector category" name="cat"  value="{{$cat->category}}" id="{{$cat->category}}">
                                    <label for="{{$cat->category}}">{{$cat->category}}</label>
                                </div>
                                    @endforeach
                            </div>

                            <!--=======  End of single sidebar widget  =======-->

                            <!--=======  single sidebar widget  =======-->



                            <!--=======  End of single sidebar widget  =======-->

                            <!--=======  single sidebar widget  =======-->

                            <div class="single-sidebar-widget mb-40">
                                <h2 class="single-sidebar-widget--title">Recent products</h2>

                                <!--=======  widget product wrapper  =======-->

                                <div class="widget-product-wrapper">
                                    <!--=======  single widget product  =======-->
                                    @foreach($resent_produt as $reproduct)
                                    <div class="single-widget-product-wrapper">
                                        <div class="single-widget-product">
                                            <!--=======  image  =======-->

                                            <div class="single-widget-product__image">
                                                <a href="{{route('product.view',$reproduct->id)}}">
                                                    <img src="{{asset($reproduct->product_image)}}" class="img-fluid" alt="">
                                                </a>
                                            </div>

                                            <!--=======  End of image  =======-->

                                            <!--=======  content  =======-->

                                            <div class="single-widget-product__content">

                                                <div class="single-widget-product__content__top">
                                                    <h3 class="product-title"><a href="{{route('product.view',$reproduct->id)}}">{{$reproduct->product_name}}</a></h3>
                                                    <?php
                                                    $min_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$reproduct->schedule_name)->min('regular_price');
                                                    $max_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$reproduct->schedule_name)->max('regular_price');
                                                    ?>
                                                    <div class="price">

                                                        <span class="discounted-price">${{$min_amount}}</span> -
                                                        <span class="discounted-price">${{$max_amount}}</span>
                                                    </div>
                                                    <div class="rating">
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star"></i>
                                                        <i class="ion-android-star-outline"></i>
                                                        <i class="ion-android-star-outline"></i>
                                                        <i class="ion-android-star-outline"></i>
                                                    </div>
                                                </div>

                                            </div>

                                            <!--=======  End of content  =======-->
                                        </div>
                                    </div>
                                    @endforeach

                                    <!--=======  End of single widget product  =======-->


                                </div>

                                <!--=======  End of widget product wrapper  =======-->
                            </div>

                            <!--=======  End of single sidebar widget  =======-->

                            <!--=======  single sidebar widget  =======-->

                            <div class="single-sidebar-widget">
                                <h2 class="single-sidebar-widget--title">Tags</h2>

                                <div class="tag-container">
                                    <a href="#">bags</a>
                                    <a href="#">chair</a>
                                    <a href="#">clock</a>
                                    <a href="#">comestic</a>
                                    <a href="#">fashion</a>
                                    <a href="#">furniture</a>
                                    <a href="#">holder</a>
                                    <a href="#">mask</a>
                                    <a href="#">men</a>
                                    <a href="#">oil</a>
                                </div>
                            </div>

                            <!--=======  End of single sidebar widget  =======-->
                        </div>

                        <!--=======  End of page sidebar  =======-->
                    </div>
                    <div class="col-xl-9 col-lg-9 order-1 order-lg-2 mb-md-80 mb-sm-80">
                        <div class="text-center loadimage">
                            <img src="{{asset('assets/frontend/images/loading.gif')}}">
                        </div>
                        <div class="row product-isotope shop-product-wrap five-column product">

                            <!--=======  single product  =======-->


                                @include('frontend.include.productSingle')



                            <!--=======  End of single product  =======-->


                        </div>

{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12 text-center mt-30">--}}
{{--                                <a class="lezada-button lezada-button--medium lezada-button--icon--left" href="#"><i class="ion-android-add"></i> MORE</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>

        <!--=====  End of shop page content  ======-->
    </div>
@stop

@section('js')
    <script>

        $('.loadimage').show();
        $('.product').hide();
        setTimeout(function(){
            $('.loadimage').hide();
            $('.product').show();


        }, 2000);


        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });


        $(document).ready(function () {



            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();

                $("html, body").animate({ scrollTop: 0 }, "slow");

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                // console.log(myurl);
                var newurl = myurl.substr(0,myurl.length-1);

                var page=$(this).attr('href').split('page=')[1];
                var newurldata = (newurl+page);
                // console.log(newurldata);
                getData(myurl);
            });




            $('#price-amount').click(function () {
                console.log($(this).val());
            })



            $('.productname').keyup(function () {
                var name = $(this).val();
                $.ajax({
                    type : "POST",
                    url: "{{route('get.product.by.name')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'name' : name

                    },
                    success:function(data){
                        console.log(data);
                        $('.loadimage').show();
                        $('.product').hide();
                        setTimeout(function(){
                            $('.loadimage').hide();
                            $('.product').show();
                            $('.product').empty().append(data.view);

                            }, 2000);
                    }
                });
            });



            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function(){
                filter_data();
            });


            filter_data();

            function filter_data() {
                var catagory = get_filter('category');

                $.ajax({
                    type : "POST",
                    url: "{{route('get.product.by.category')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'catagory' : catagory,
                    },
                    success:function(data){
                        // console.log(data)
                        $('.loadimage').show();
                        $('.product').hide();
                        setTimeout(function(){
                            $('.loadimage').hide();
                            $('.product').show();
                            $('.product').empty().append(data.view);

                        }, 2000);

                    }
                });
            }







            {{--$.ajax({--}}
            {{--    type : "POST",--}}
            {{--    url: "{{route('get_product')}}",--}}
            {{--    data : {--}}
            {{--        '_token' : "{{csrf_token()}}",--}}
            {{--    },--}}
            {{--    success:function(data){--}}
            {{--        console.log(data);--}}
            {{--        $('.product').empty().append(data.view);--}}

            {{--    }--}}
            {{--});--}}
        });



        function getData(myurl){
            $.ajax(
                {
                    url: myurl,
                    type: "get",
                    data : {
                        '_token' : "{{csrf_token()}}",
                    },
                    datatype: "html"
                }).done(function(data){
                $('.product').empty().append(data.view);

                // location.hash = myurl;

            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert('No response from server');
            });
        }



    </script>
@stop
