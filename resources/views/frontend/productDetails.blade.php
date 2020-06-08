@extends('layouts.frontend')
@section('css')
    <style>
        .card {
            width: 100px;
            height: 100px;
            background: url("") no-repeat;
            margin:auto;
        }

        .card:hover{
            -ms-transform: scale(2);
            -webkit-transform: scale(2);
            transform: scale(2);
        }
        .button {
            width: 150px;
            background-color: #FFF;
            border:none;
            display: inline-block;
        }
        .padd{
            padding-bottom:50px;
            margin:auto;
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
                        <li class="breadcrumb-list__item"><a href="shop-left-sidebar.html">SHOP</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">SHOP PRODUCT</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>


    <div class="shop-page-wrapper mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  shop product content  =======-->

                    <div class="shop-product">
                        <div class="row pb-100">
                            <div class="col-lg-6 mb-md-70 mb-sm-70">
                                <!--=======  shop product big image gallery  =======-->

                                <div class="shop-product__big-image-gallery-wrapper mb-30">

                                    <!--=======  shop product gallery icons  =======-->

                                    <div class="shop-product-rightside-icons">
										<span class="wishlist-icon">
											<a href="#" data-tippy="Add to wishlist" data-tippy-placement="left" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" ><i class="ion-android-favorite-outline"></i></a>
										</span>
                                        <span class="enlarge-icon">
											<a class="btn-zoom-popup" href="#" data-tippy="Click to enlarge" data-tippy-placement="left" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" ><i class="ion-android-expand"></i></a>
										</span>
                                    </div>

                                    <!--=======  End of shop product gallery icons  =======-->

                                    <div class="shop-product__big-image-gallery-slider">

                                        <!--=======  single image  =======-->

                                        <div class="single-image">
                                            <img src="{{asset($product_details->product_image)}}" style="width: 100%" class="img-fluid" alt="">
                                        </div>

                                        <!--=======  End of single image  =======-->

                                        <!--=======  single image  =======-->

                                        <!--=======  End of single image  =======-->
                                    </div>

                                </div>

                                <!--=======  End of shop product big image gallery  =======-->

                                <!--=======  shop product small image gallery  =======-->



                                <!--=======  End of shop product small image gallery  =======-->
                            </div>

                            <div class="col-lg-6">
                                <!--=======  shop product description  =======-->

                                <div class="shop-product__description">
                                    <!--=======  shop product navigation  =======-->

                                    <div class="shop-product__navigation">
                                        <a href="shop-product-basic.html"><i class="ion-ios-arrow-thin-left"></i></a>
                                        <a href="shop-product-basic.html"><i class="ion-ios-arrow-thin-right"></i></a>
                                    </div>

                                    <!--=======  End of shop product navigation  =======-->

                                    <!--=======  shop product rating  =======-->

                                    <div class="shop-product__rating mb-15">
										<span class="product-rating">
											<i class="active ion-android-star"></i>
											<i class="active ion-android-star"></i>
											<i class="active ion-android-star"></i>
											<i class="active ion-android-star"></i>
											<i class="ion-android-star-outline"></i>
										</span>

                                        <span class="review-link ml-20">
											<a href="#">(3 customer reviews)</a>
										</span>
                                    </div>

                                    <!--=======  End of shop product rating  =======-->

                                    <!--=======  shop product title  =======-->

                                    <div class="shop-product__title mb-15">
                                        <h2>{{$product_details->product_name}}</h2>
                                    </div>

                                    <!--=======  End of shop product title  =======-->

                                    <!--=======  shop product price  =======-->
                                    <?php

                                    $min_array = array();

                                    $min_amount = \App\product_schedule::distinct()->select('regular_price')
                                        ->where('category_name',$product_details->category)
                                        ->where('schedule_name',$product_details->schedule_name)->get();


                                    for ($i=0;$i<count($min_amount);$i++){
                                        $am = \App\product_schedule::where('regular_price',$min_amount[$i]['regular_price'])
                                            ->first();
                                        array_push($min_array,$am->regular_price);
                                    }

                                    ?>
                                    <div class="shop-product__price mb-30">
                                        <span class="discounted-price">${{min($min_array)}} </span>-
                                        <span class="discounted-price">${{max($min_array)}}</span>
                                    </div>

                                    <!--=======  End of shop product price  =======-->

                                    <!--=======  shop product short description  =======-->

                                    <div class="shop-product__short-desc mb-50">
                                        {!! $product_details->short_description !!}
                                    </div>

                                    <!--=======  End of shop product short description  =======-->
                                    <form action="{{route('add.to.cart')}}" method="post">
                                    @csrf
                                    <!--=======  shop product size block  =======-->
                                        <?php
                                        $width = \App\product_schedule::distinct()->select('width')->where('schedule_name',$product_details->schedule_name)->get();
                                        $length = \App\product_schedule::distinct()->select('length')->where('schedule_name',$product_details->schedule_name)->get();
                                        ?>
                                        <div class="shop-product__brands mb-20">
                                            <div class="shop-product__block__title">Width: </div>
                                            <select class="form-control width">
                                                @foreach($width as $wt)
                                                    <option value="{{$wt->width}}">{{$wt->width}}</option>
                                                @endforeach
                                            </select>

                                            <select class="form-control twid_fra widtfrac" name="witdhtside" style="margin-top: 0px;margin-left: 5px;">
                                                <option value="0" selected="" >0</option>
                                                <option value="1/8" >1/8</option>
                                                <option value="1/4" >1/4</option>
                                                <option value="3/8" >3/8</option>
                                                <option value="1/2" >1/2</option>
                                                <option value="5/8" >5/8</option>
                                                <option value="5/8" >5/8</option>
                                                <option value="7/8" >7/8</option>
                                            </select>




                                        </div>

                                        <div class="shop-product__brands mb-20">
                                            <div class="shop-product__block__title">Length: </div>
                                            <select class="form-control length">
                                                @foreach($length as $lt)
                                                    <option value="{{$lt->length}}">{{$lt->length}}</option>
                                                @endforeach
                                            </select>



                                            <select class="form-control twid_fra lengthfrac" name="legthside" style="margin-top: 0px;margin-left: 5px;">
                                                <option value="0" selected="" >0</option>
                                                <option value="1/8" >1/8</option>
                                                <option value="1/4" >1/4</option>
                                                <option value="3/8" >3/8</option>
                                                <option value="1/2">1/2</option>
                                                <option value="5/8" >5/8</option>
                                                <option value="5/8" >5/8</option>
                                                <option value="7/8" >7/8</option>
                                            </select>


                                        </div>

                                        <br>
                                        <div class="shop-product__price mb-30 pricecng">
                                            <?php
                                                $abc = 1235.23657
                                            ?>
                                            <span class="discounted-price">${{number_format($abc,2)}}</span>
                                        </div>
                                        <h4 class="addacc">Addon Accessories</h4>
                                        <div class="shop-product__block shop-product__block--size mb-20">
                                            <div class="shop-product__block__value">
                                                <div class="shop-product-size-list">


                                                    <div class="visionf1">
                                                        <input type="hidden" class="f4" id="blinds1" name="blinds4" value="0">
                                                        <label for="vehicle4" class="f1amvalvishon"> Square or Louvolite fascia($80.00)</label>
                                                    </div>

                                                    <div class="addacc">
                                                        <div class="loveria">
                                                            <input type="checkbox" class="f1" id="blinds1" name="blinds1" value="80">
                                                            <label for="vehicle1" class="f1amval"> Square or Louvolite fascia($80.00)</label>
                                                        </div>
                                                    <div class="deocr">
                                                        <input type="checkbox" class="f3" id="blinds2" name="blinds2" value="56">
                                                        <label for="vehicle2" class="f3amval"> Decor Cassette ($56.00)</label>
                                                        <br>
                                                    </div>
                                                        <div class="valnce">
                                                    <input type="checkbox" class="f2" id="blinds3" name="blinds3" value="48">
                                                    <label for="vehicle3" class="f2amval"> Valance ($48.00)</label>
                                                        </div>
                                                </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!--=======  End of shop product size block  =======-->

                                        <!--=======  shop product color block  =======-->

                                        <div class="shop-product__block shop-product__block--color mb-20">
                                            <div class="shop-product__block__value">
                                                <div class="shop-product-color-list">

                                                    <ul class="single-filter-widget--list single-filter-widget--list--color">
                                                        <li class="mb-0 pt-0 pb-0 mr-10"><span class="option_price">Options Price: $0.00</span></li>
                                                        <br>
                                                        <li class="mb-0 pt-0 pb-0 mr-10"><span class="product_price">Product Price: ${{min($min_array)}}</span></li>
                                                        <br>
                                                        <li class="mb-0 pt-0 pb-0 mr-10"><span class="total">Total: ${{number_format(min($min_array),2)}}</span></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <!--=======  End of shop product color block  =======-->

                                        <!--=======  shop product quantity block  =======-->

                                        <div class="shop-product__block shop-product__block--quantity mb-40">
                                            <div class="shop-product__block__title">Quantity: </div>
                                            <div class="shop-product__block__value">
                                                <div class="pro-qty d-inline-block mx-0 pt-0">
                                                    <input type="text" name="qty" value="1">

                                                </div>
                                            </div>
                                            <input type="hidden" class="schedulename" value="{{$product_details->schedule_name}}">
                                            <input type="hidden" class="catname" value="{{$product_details->category}}">
                                            <input type="hidden" class="newPricepro" name="price" value="{{min($min_array)}}" >
                                            <input type="hidden" class="optionPrice" value="0.00" >
                                            <input type="hidden" class="totalPrice" value="0.00" >
                                            <input type="hidden" class="proPrice" value="{{min($min_array)}}" >
                                            <input type="hidden" class="proid" name="pro_id" value="{{$product_details->id}}" >
                                            <input type="hidden" class="latestprice" name="latest_price" value="{{min($min_array)}}" >


                                            <?php
                                                $cat_dis = \App\product_discount::where('category',$product_details->category)->first();
                                            ?>

                                            @if ($cat_dis)
                                                <input type="hidden" class="catdiscount" name="pro_id" value="{{$cat_dis->discount_price}}" >
                                            @else
                                                <input type="hidden" class="catdiscount" name="pro_id" value="">
                                            @endif


                                        </div>

                                        <!--=======  End of shop product quantity block  =======-->

                                        <!--=======  shop product buttons  =======-->

                                        <div class="shop-product__buttons mb-40">
                                            <button class="lezada-button lezada-button--medium">add to cart</button>
                                        </div>
                                    </form>

                                    <!--=======  End of shop product buttons  =======-->

                                    <!--=======  shop product brands  =======-->



                                    <!--=======  End of shop product brands  =======-->

                                    <!--=======  other info table  =======-->

                                    <div class="quick-view-other-info pb-0">
                                        <table>
                                            <tr class="single-info">
                                                <td class="quickview-title">Categories: </td>
                                                <td class="quickview-value">
                                                    <a href="#">{{$product_details->category}}</a>,
                                                </td>
                                            </tr>
                                            <tr class="single-info">
                                                <td class="quickview-title">Tags: </td>
                                                <td class="quickview-value">
                                                    <a href="#">{{$product_details->tags}}</a>,
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!--=======  End of other info table  =======-->
                                </div>

                                <!--=======  End of shop product description  =======-->
                            </div>
                        </div>
                        <!----====== Colour Variant Columb------>

                        <div class="row">
                            <div class="col-lg-12">
                                <!--=======  shop product description tab  =======-->

                                <div class="shop-product__description-tab pt-100">
                                    <!--=======  tab navigation  =======-->

                                    <div class="tab-product-navigation tab-product-navigation--product-desc mb-50">
                                        <div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
                                            <a class="nav-item nav-link active" id="product-tab-1" data-toggle="tab" href="#product-series-1" role="tab" aria-selected="true">Colour Options</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <?php
                                    $procolor =  \App\product_color_image::where('product_id',$product_details->id)->get();
//                                    for ($i=0;$i<count($procolor);$i++){
//
//                                    }
                                    ?>
                                    @for ($i=0;$i<count($procolor);$i++)
                                            <div class="col-lg-sm padd">
                                                <button  class="button">
                                                    <div class="card" style="background-image: url('{{asset('assets/admin/images/productcolorimage/'.$procolor[$i]->color_image)}}')">

                                                    </div>
                                                    <p>{{$procolor[$i]->color_name}}</p>
                                                </button>
                                            </div>


                                            <script>
                                                function Operation(i) {
                                                    alert("Selected"+i);
                                                }
                                            </script>

                                    @endfor


                                </div>

                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <!--=======  shop product description tab  =======-->

                                    <div class="shop-product__description-tab pt-100">
                                        <!--=======  tab navigation  =======-->

                                        <div class="tab-product-navigation tab-product-navigation--product-desc mb-50">
                                            <div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
                                                <a class="nav-item nav-link active" id="product-tab-1" data-toggle="tab" href="#product-series-1" role="tab" aria-selected="true">Description</a>
                                                {{--                                            <a class="nav-item nav-link" id="product-tab-2" data-toggle="tab" href="#product-series-2" role="tab" aria-selected="false">Additional information</a>--}}
                                                {{--                                            <a class="nav-item nav-link" id="product-tab-3" data-toggle="tab" href="#product-series-3" role="tab" aria-selected="false">Reviews (3)</a>--}}
                                            </div>
                                        </div>

                                        <!--=======  End of tab navigation  =======-->

                                        <!--=======  tab content  =======-->

                                        <div class="tab-content" id="nav-tabContent2">

                                            <div class="tab-pane fade show active" id="product-series-1" role="tabpanel" aria-labelledby="product-tab-1">
                                                <!--=======  shop product long description  =======-->

                                                <div class="shop-product__long-desc mb-30">
                                                    <p>{!! $product_details->long_description !!}</p>
                                                </div>

                                                <!--=======  End of shop product long description  =======-->
                                            </div>

                                            <div class="tab-pane fade" id="product-series-2" role="tabpanel" aria-labelledby="product-tab-2">
                                                <!--=======  shop product additional information  =======-->

                                                <div class="shop-product__additional-info">
                                                    <table class="shop-attributes">
                                                        <tbody>
                                                        <tr>
                                                            <th>Size</th>
                                                            <td><p>L, M, S, XS</p></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Color</th>
                                                            <td><p>Black, Blue, Brown</p></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!--=======  End of shop product additional information  =======-->
                                            </div>

                                            <div class="tab-pane fade" id="product-series-3" role="tabpanel" aria-labelledby="product-tab-3">
                                                <!--=======  shop product reviews  =======-->

                                                <div class="shop-product__review">
                                                    <h2 class="review-title mb-20">3 reviews for High-waist Trousers</h2>

                                                    <!--=======  single review  =======-->

                                                    <div class="single-review">
                                                        <div class="single-review__image">
                                                            <img src="{{asset('assets/frontend/')}}/images/user/user1.jpg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="single-review__content">
                                                            <!--=======  rating  =======-->

                                                            <div class="shop-product__rating">
															<span class="product-rating">
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="ion-android-star-outline"></i>
															</span>
                                                            </div>

                                                            <!--=======  End of rating  =======-->

                                                            <!--=======  username and date  =======-->

                                                            <p class="username">Scott James <span class="date">/ April 5, 2018</span></p>

                                                            <!--=======  End of username and date  =======-->

                                                            <!--=======  message  =======-->

                                                            <p class="message">
                                                                Thanks for always keeping your HTML themes up to date. Your level of support and dedication is second to none.
                                                            </p>

                                                            <!--=======  End of message  =======-->
                                                        </div>
                                                    </div>

                                                    <!--=======  End of single review  =======-->

                                                    <!--=======  single review  =======-->

                                                    <div class="single-review">
                                                        <div class="single-review__image">
                                                            <img src="{{asset('assets/frontend/')}}/images/user/user2.jpg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="single-review__content">
                                                            <!--=======  rating  =======-->

                                                            <div class="shop-product__rating">
															<span class="product-rating">
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="ion-android-star-outline"></i>
															</span>
                                                            </div>

                                                            <!--=======  End of rating  =======-->

                                                            <!--=======  username and date  =======-->

                                                            <p class="username">Owen Christ <span class="date">/ April 7, 2018</span></p>

                                                            <!--=======  End of username and date  =======-->

                                                            <!--=======  message  =======-->

                                                            <p class="message">
                                                                I didn’t expect this poster to arrive folded. Now there are lines on the poster and one sad Ninja.
                                                            </p>

                                                            <!--=======  End of message  =======-->
                                                        </div>
                                                    </div>

                                                    <!--=======  End of single review  =======-->

                                                    <!--=======  single review  =======-->

                                                    <div class="single-review">
                                                        <div class="single-review__image">
                                                            <img src="{{asset('assets/frontend/')}}/images/user/user3.jpg" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="single-review__content">
                                                            <!--=======  rating  =======-->

                                                            <div class="shop-product__rating">
															<span class="product-rating">
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="active ion-android-star"></i>
																<i class="ion-android-star-outline"></i>
															</span>
                                                            </div>

                                                            <!--=======  End of rating  =======-->

                                                            <!--=======  username and date  =======-->

                                                            <p class="username">Edna Watson <span class="date">/ April 5, 2018</span></p>

                                                            <!--=======  End of username and date  =======-->

                                                            <!--=======  message  =======-->

                                                            <p class="message">
                                                                Can’t wait to start mixin’ with this one! Irba-irr-Up-up-up-up-date your theme!
                                                            </p>

                                                            <!--=======  End of message  =======-->
                                                        </div>
                                                    </div>

                                                    <!--=======  End of single review  =======-->

                                                    <h2 class="review-title mb-20">Add a review</h2>
                                                    <p class="text-center">Your email address will not be published. Required fields are marked *</p>

                                                    <!--=======  review form  =======-->

                                                    <div class="lezada-form lezada-form--review">
                                                        <form action="#">
                                                            <div class="row">
                                                                <div class="col-lg-6 mb-20">
                                                                    <input type="text" placeholder="Name *" required>
                                                                </div>
                                                                <div class="col-lg-6 mb-20">
                                                                    <input type="email" placeholder="Email *" required>
                                                                </div>
                                                                <div class="col-lg-12 mb-20">
                                                                    <span class="rating-title mr-30">YOUR RATING</span>
                                                                    <span class="product-rating">

																	<i class="active ion-android-star-outline"></i>
																	<i class="active ion-android-star-outline"></i>
																	<i class="active ion-android-star-outline"></i>
																	<i class="active ion-android-star-outline"></i>
																	<i class="active ion-android-star-outline"></i>
																</span>
                                                                </div>
                                                                <div class="col-lg-12 mb-20">
                                                                    <textarea cols="30" rows="10" placeholder="Your review *"></textarea>
                                                                </div>
                                                                <div class="col-lg-12 text-center">
                                                                    <button type="submit" class="lezada-button lezada-button--medium">submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <!--=======  End of review form  =======-->


                                                </div>

                                                <!--=======  End of shop product reviews  =======-->
                                            </div>

                                        </div>

                                        <!--=======  End of tab content  =======-->
                                    </div>

                                    <!--=======  End of shop product description tab  =======-->
                                </div>
                            </div>
                        </div>

                        <!--=======  End of shop product content  =======-->
                    </div>
                </div>
            </div>
        </div>
        @stop

        @section('js')
            <script>
                $(document).ready(function () {


                    var catnam = $('.catname').val();
                    var oldprr1 = $('.newPricepro').val();
                    var catdis1 = $('.catdiscount').val();


                    if (catdis1 == ""){
                        var prrr = `<span class="discounted-price">$${oldprr1}</span>`;
                        $('.pricecng').empty().html(prrr);

                        var totl = `<span class="discounted-price">Total: $${oldprr1}</span>`;
                        $('.total').empty().html(totl);

                        $('.latestprice').val(oldprr1.toFixed(2))

                    }else {
                        var disprice = (oldprr1 * catdis1 ) / 100

                        var finalproice = oldprr1 - disprice;

                        var prrr = `<span class="discounted-price">$${finalproice.toFixed(2)}</span>`;
                        $('.pricecng').empty().html(prrr);

                        var totl = `<span class="discounted-price">Total: $${finalproice.toFixed(2)}</span>`;
                        $('.total').empty().html(totl);

                        $('.latestprice').val(finalproice.toFixed(2))

                    }


                    //********* withd fraction
                    $('.widtfrac').change(function () {
                        var wd_val = $('.width').val();
                        var wd_fr = $(this).val();
                        var len_fr = $('.lengthfrac').val();
                        var len_val = $('.length').val();

                        if (len_fr == 0){
                            var len_mins = parseInt(len_val) - parseInt(1);
                            if (len_mins < 36){
                                var length = (parseInt(len_val) + parseInt(1)) - parseInt(1);
                            }else {
                                var length = parseInt(len_val) - parseInt(1);
                            }
                        }else {
                            var length = parseInt(len_val) + parseInt(1);

                        }

                        var schedule = $('.schedulename').val();
                        var catname = $('.catname').val();

                        if (wd_fr == 0){
                            var wid_mins = parseInt(wd_val) - parseInt(1);
                            if (wid_mins < 24){
                                var width  = (parseInt(wd_val) + parseInt(1)) - parseInt(1);
                                var wd = (parseInt(wd_val) + parseInt(1)) - parseInt(1);
                            }else {
                                var width  = (parseInt(wd_val) + parseInt(1)) - parseInt(1);
                                var wd = (parseInt(wd_val) + parseInt(1)) - parseInt(1);
                            }
                        }else {
                            var width  = parseInt(wd_val)  + parseInt(1);
                            var wd = parseInt(wd_val)  + parseInt(1);
                        }


                        // var width  = parseInt(wd_val) + parseInt(1);
                        // var wd = parseInt(wd_val) + parseInt(1);
                        // vishion blind
                        if(catname == 'Vision Blinds'){

                            if (wd == 24 && length > 72 ){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(16);
                                var fnvalama = 'Square or Louvolite fascia($16.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $16`);
                            }else if (wd >= 25 && wd <= 30 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(20);
                                var fnvalama = 'Square or Louvolite fascia($20.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $16`);
                            }else if (wd >= 31 && wd <= 36 && length > 72 ){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(24);
                                var fnvalama = 'Square or Louvolite fascia($24.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $16`);
                            }else if (wd >= 37 && wd <= 42 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(28);
                                var fnvalama = 'Square or Louvolite fascia($28.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $28`);
                            }else if (wd >= 43 && wd <= 48 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(32);
                                var fnvalama = 'Square or Louvolite fascia($32.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $32`);
                            }else if (wd >= 49 && wd <= 54 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(36);
                                var fnvalama = 'Square or Louvolite fascia($36.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $36`);
                            }else if (wd >= 55 && wd <= 60 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(40);
                                var fnvalama = 'Square or Louvolite fascia($40.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $40`);
                            }else if (wd >= 61 && wd <= 66 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(44);
                                var fnvalama = 'Square or Louvolite fascia($44.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $44`);
                            }else if (wd >= 67 && wd <= 72 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(48);
                                var fnvalama = 'Square or Louvolite fascia($48.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $48`);
                            }else if (wd >= 73 && wd <= 84 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(56);
                                var fnvalama = 'Square or Louvolite fascia($56.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $56`);
                            }else if (wd >= 85 && wd <= 96 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(64);
                                var fnvalama = 'Square or Louvolite fascia($64.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $64`);
                            }

                            else {
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.visionf1').hide();
                                $('.f1').val(0);
                                $('.f4').val(0);
                                $('.addacc').hide();
                                $('.option_price').hide();
                            }


                            $.ajax({
                                type : "POST",
                                url: "{{route('get_product_price')}}",
                                data : {
                                    '_token' : "{{csrf_token()}}",
                                    'width' : width,
                                    'length' : length,
                                    'schedule' : schedule,
                                    'catname' : catname,
                                },
                                success:function(data){
                                    var nprice = Math.floor(data.regular_price)
                                    var oldprr = $('.newPricepro').val();

                                    var catdis = $('.catdiscount').val();


                                    var f4pr = $('.f4').val();


                                    var total =  parseInt(nprice) + parseInt(f4pr);
                                    if (catdis == ""){
                                        console.log('nai')
                                        var prrr = `<span class="discounted-price">$${total}</span>`;
                                        $('.pricecng').empty().html(prrr);

                                        var totl = `<span class="discounted-price">Total: $${total}</span>`;
                                        $('.total').empty().html(totl);

                                        $('.latestprice').empty().val(total);

                                    }else {
                                        var disprice = (total * catdis ) / 100

                                        var finalproice = total - disprice;

                                        var prrr = `<span class="discounted-price">$${finalproice.toFixed(2)}</span>`;
                                        $('.pricecng').empty().html(prrr);

                                        var totl = `<span class="discounted-price">Total: $${finalproice.toFixed(2)}</span>`;
                                        $('.total').empty().html(totl);

                                        $('.latestprice').empty().val(finalproice.toFixed(2));

                                    }

                                    var propice = `<span class="product_price">Product Price: $${oldprr}</span>`;
                                    $('.product_price').empty().html(propice);

                                }
                            });


                        }
                        //other category
                        else {

                            if (wd == 24)
                            {
                                $('.f1').val(80);
                                var fnvalama = 'Square or Louvolite fascia($80.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(56);
                                var fnvalama3 = 'Decor Cassette($56.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(48);
                                var fnvalama2 = 'Valance($48.00)';
                                $('.f2amval').empty().html(fnvalama2);

                            }else if(wd >= 25 && wd <= 32){
                                $('.f1').val(120);
                                var fnvalama = 'Square or Louvolite fascia($120.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(84);
                                var fnvalama3 = 'Decor Cassette($84.00)';
                                $('.f3amval').empty().html(fnvalama3);


                                $('.f2').val(48);
                                var fnvalama2 = 'Valance($48.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }else if(wd >= 33 && wd <= 40  ){
                                $('.f1').val(140);
                                var fnvalama = 'Square or Louvolite fascia($140.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(98);
                                var fnvalama3 = 'Decor Cassette($98.00)';
                                $('.f3amval').empty().html(fnvalama3);


                                $('.f2').val(48);
                                var fnvalama2 = 'Valance($48.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }else if(wd >= 41 && wd <= 48 ){


                                $('.f1').val(160);
                                var fnvalama = 'Square or Louvolite fascia($160.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(112);
                                var fnvalama3 = 'Decor Cassette($112.00)';
                                $('.f3amval').empty().html(fnvalama3);


                                $('.f2').val(64);
                                var fnvalama2 = 'Valance($64.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }
                            else if(wd >= 49 && wd <= 56){

                                $('.f1').val(200);
                                var fnvalama = 'Square or Louvolite fascia($200.00)';
                                $('.f1amval').empty().html(fnvalama);


                                $('.f3').val(140);
                                var fnvalama3 = 'Decor Cassette($140.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(75);
                                var fnvalama2 = 'Valance($75.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }
                            else if(wd >= 57 && wd <= 64){
                                $('.f1').val(220);
                                var fnvalama = 'Square or Louvolite fascia($220.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(154);
                                var fnvalama3 = 'Decor Cassette($154.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(86);
                                var fnvalama2 = 'Valance($86.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            } else if(wd >= 65 && wd <= 72){
                                $('.f1').val(240);
                                var fnvalama = 'Square or Louvolite fascia($240.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(168);
                                var fnvalama3 = 'Decor Cassette($168.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(96);
                                var fnvalama2 = 'Valance($96.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }else if(wd >= 73 && wd <= 80){
                                $('.f1').val(280);
                                var fnvalama = 'Square or Louvolite fascia($280.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(107);
                                var fnvalama2 = 'Valance($107.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 81 && wd <= 88){
                                $('.f1').val(300);
                                var fnvalama = 'Square or Louvolite fascia($300.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(117);
                                var fnvalama2 = 'Valance($117.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 89 && wd <= 96){
                                $('.f1').val(320);
                                var fnvalama = 'Square or Louvolite fascia($320.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(128);
                                var fnvalama2 = 'Valance($128.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 97 && wd <= 104){
                                $('.f1').val(360);
                                var fnvalama = 'Square or Louvolite fascia($360.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(138);
                                var fnvalama2 = 'Valance($138.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 105 && wd <= 112){
                                $('.f1').val(380);
                                var fnvalama = 'Square or Louvolite fascia($380.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(150);
                                var fnvalama2 = 'Valance($150.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 113 && wd <= 120){
                                $('.f1').val(400);
                                var fnvalama = 'Square or Louvolite fascia($400.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(165);
                                var fnvalama2 = 'Valance($165.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }

                            $.ajax({
                                type : "POST",
                                url: "{{route('get_product_price')}}",
                                data : {
                                    '_token' : "{{csrf_token()}}",
                                    'width' : width,
                                    'length' : length,
                                    'schedule' : schedule,
                                    'catname' : catname,
                                },
                                success:function(data){

                                    var schedule_name = data.schedule_name;
                                    var n_price = Math.floor(data.regular_price);
                                    console.log("price is " +n_price)



                                    var catdis = $('.catdiscount').val();


                                    if (catdis == ""){
                                        var prrr = `<span class="discounted-price">$${n_price.toFixed(2)}</span>`;
                                        $('.pricecng').empty().html(prrr);
                                        $('.newPricepro').val(n_price);
                                        $('.latestprice').empty().val(n_price.toFixed(2));

                                    }else {

                                        var disprice = (n_price * catdis) / 100;
                                        var finalprice = n_price - disprice;
                                        console.log(finalprice)
                                        var prrr = `<span class="discounted-price">$${finalprice.toFixed(2)}</span>`;
                                        $('.pricecng').empty().html(prrr);
                                        $('.newPricepro').val(n_price.toFixed(2));

                                        $('.latestprice').empty().val(finalprice.toFixed(2));

                                    }
                                    $(".f1").prop("checked", false);
                                    $(".f3").prop("checked", false);
                                    $(".f2").prop("checked", false);

                                    if (schedule_name == "J"){
                                        if (width > 72 || length > 70 ){
                                            $('.deocr').hide();
                                        }else if(width < 72 || length < 72){
                                            $('.deocr').show();
                                        }
                                    }else{
                                        if (width > 72 || length > 72 ){
                                            $('.deocr').hide();
                                        }else if(width < 72 || length < 72){
                                            $('.deocr').show();
                                        }
                                    }
                                    $('.pricecng').show();

                                    var oldtotalrice = $('.newPricepro').val();
                                    $('.total').empty().append(`Total: $${oldtotalrice}`);
                                    $('.product_price').empty().append(`Product Price: ${data.regular_price}`);

                                }
                            });
                        }


                    });

                    //********* end withd fraction

                    var widt = $('.width').val();
                    if(catnam == 'Vision Blinds'){

                        $('.loveria').hide();
                        $('.deocr').hide();
                        $('.valnce').hide();
                        $('.visionf1').hide();
                        $('.option_price').hide();
                        $('.addacc').hide();

                    }else {
                        $('.visionf1').hide();
                    }
                    //********* withd
                    $('.width').change(function (e) {
                        e.preventDefault();
                        var width = $('.width').val();
                        var length = $('.length').val();
                        var schedule = $('.schedulename').val();
                        var catname = $('.catname').val();



                        var wd = $(this).val();
                        // vishion blind
                        if(catname == 'Vision Blinds'){

                            if (wd == 24 && length > 72 ){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(16);
                                var fnvalama = 'Square or Louvolite fascia($16.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $16`);
                            }else if (wd >= 25 && wd <= 30 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(20);
                                var fnvalama = 'Square or Louvolite fascia($20.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $16`);
                            }else if (wd >= 31 && wd <= 36 && length > 72 ){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(24);
                                var fnvalama = 'Square or Louvolite fascia($24.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $16`);
                            }else if (wd >= 37 && wd <= 42 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(28);
                                var fnvalama = 'Square or Louvolite fascia($28.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $28`);
                            }else if (wd >= 43 && wd <= 48 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(32);
                                var fnvalama = 'Square or Louvolite fascia($32.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $32`);
                            }else if (wd >= 49 && wd <= 54 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(36);
                                var fnvalama = 'Square or Louvolite fascia($36.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $36`);
                            }else if (wd >= 55 && wd <= 60 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(40);
                                var fnvalama = 'Square or Louvolite fascia($40.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $40`);
                            }else if (wd >= 61 && wd <= 66 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(44);
                                var fnvalama = 'Square or Louvolite fascia($44.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $44`);
                            }else if (wd >= 67 && wd <= 72 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(48);
                                var fnvalama = 'Square or Louvolite fascia($48.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $48`);
                            }else if (wd >= 73 && wd <= 84 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(56);
                                var fnvalama = 'Square or Louvolite fascia($56.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $56`);
                            }else if (wd >= 85 && wd <= 96 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').empty().val(64);
                                var fnvalama = 'Square or Louvolite fascia($64.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.addacc').show();
                                $('.option_price').show();
                                $('.option_price').empty().append(`Options Price: $64`);
                            }

                            else {
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.visionf1').hide();
                                $('.f1').val(0);
                                $('.f4').val(0);
                                $('.addacc').hide();
                                $('.option_price').hide();
                            }


                            $.ajax({
                                type : "POST",
                                url: "{{route('get_product_price')}}",
                                data : {
                                    '_token' : "{{csrf_token()}}",
                                    'width' : width,
                                    'length' : length,
                                    'schedule' : schedule,
                                    'catname' : catname,
                                },
                                success:function(data){
                                    var nprice = Math.floor(data.regular_price)
                                    var oldprr = $('.newPricepro').val();

                                    var catdis = $('.catdiscount').val();


                                    var f4pr = $('.f4').val();


                                    var total =  parseInt(nprice) + parseInt(f4pr);
                                    if (catdis == ""){
                                        console.log('nai')
                                        var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                                        $('.pricecng').empty().html(prrr);

                                        var totl = `<span class="discounted-price">Total: $${total.toFixed(2)}</span>`;
                                        $('.total').empty().html(totl);

                                        $('.latestprice').empty().val(total.toFixed(2));

                                    }else {
                                        var disprice = (total * catdis ) / 100

                                        var finalproice = total - disprice;

                                        var prrr = `<span class="discounted-price">$${finalproice.toFixed(2)}</span>`;
                                        $('.pricecng').empty().html(prrr);

                                        var totl = `<span class="discounted-price">Total: $${finalproice.toFixed(2)}</span>`;
                                        $('.total').empty().html(totl);

                                        $('.latestprice').empty().val(finalproice.toFixed(2));

                                        var ttl = `<span class="product_price">Total: $${finalproice.toFixed(2)}</span>`;
                                        $('.total').empty().html(ttl);

                                    }

                                        var propice = `<span class="product_price">Product Price: $${oldprr}</span>`;
                                        $('.product_price').empty().html(propice);



                                }
                            });


                        }
                        //other category
                        else {

                            if (wd == 24)
                            {
                                $('.f1').val(80);
                                var fnvalama = 'Square or Louvolite fascia($80.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(56);
                                var fnvalama3 = 'Decor Cassette($56.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(48);
                                var fnvalama2 = 'Valance($48.00)';
                                $('.f2amval').empty().html(fnvalama2);

                            }else if(wd >= 25 && wd <= 32){
                                $('.f1').val(120);
                                var fnvalama = 'Square or Louvolite fascia($120.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(84);
                                var fnvalama3 = 'Decor Cassette($84.00)';
                                $('.f3amval').empty().html(fnvalama3);


                                $('.f2').val(48);
                                var fnvalama2 = 'Valance($48.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }else if(wd >= 33 && wd <= 40  ){
                                $('.f1').val(140);
                                var fnvalama = 'Square or Louvolite fascia($140.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(98);
                                var fnvalama3 = 'Decor Cassette($98.00)';
                                $('.f3amval').empty().html(fnvalama3);


                                $('.f2').val(48);
                                var fnvalama2 = 'Valance($48.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }else if(wd >= 41 && wd <= 48 ){


                                $('.f1').val(160);
                                var fnvalama = 'Square or Louvolite fascia($160.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(112);
                                var fnvalama3 = 'Decor Cassette($112.00)';
                                $('.f3amval').empty().html(fnvalama3);


                                $('.f2').val(64);
                                var fnvalama2 = 'Valance($64.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }
                            else if(wd >= 49 && wd <= 56){

                                $('.f1').val(200);
                                var fnvalama = 'Square or Louvolite fascia($200.00)';
                                $('.f1amval').empty().html(fnvalama);


                                $('.f3').val(140);
                                var fnvalama3 = 'Decor Cassette($140.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(75);
                                var fnvalama2 = 'Valance($75.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }
                            else if(wd >= 57 && wd <= 64){
                                $('.f1').val(220);
                                var fnvalama = 'Square or Louvolite fascia($220.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(154);
                                var fnvalama3 = 'Decor Cassette($154.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(86);
                                var fnvalama2 = 'Valance($86.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            } else if(wd >= 65 && wd <= 72){
                                $('.f1').val(240);
                                var fnvalama = 'Square or Louvolite fascia($240.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(168);
                                var fnvalama3 = 'Decor Cassette($168.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(96);
                                var fnvalama2 = 'Valance($96.00)';
                                $('.f2amval').empty().html(fnvalama2);


                            }else if(wd >= 73 && wd <= 80){
                                $('.f1').val(280);
                                var fnvalama = 'Square or Louvolite fascia($280.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(107);
                                var fnvalama2 = 'Valance($107.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 81 && wd <= 88){
                                $('.f1').val(300);
                                var fnvalama = 'Square or Louvolite fascia($300.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(117);
                                var fnvalama2 = 'Valance($117.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 89 && wd <= 96){
                                $('.f1').val(320);
                                var fnvalama = 'Square or Louvolite fascia($320.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(128);
                                var fnvalama2 = 'Valance($128.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 97 && wd <= 104){
                                $('.f1').val(360);
                                var fnvalama = 'Square or Louvolite fascia($360.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(138);
                                var fnvalama2 = 'Valance($138.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 105 && wd <= 112){
                                $('.f1').val(380);
                                var fnvalama = 'Square or Louvolite fascia($380.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(150);
                                var fnvalama2 = 'Valance($150.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }else if(wd >= 113 && wd <= 120){
                                $('.f1').val(400);
                                var fnvalama = 'Square or Louvolite fascia($400.00)';
                                $('.f1amval').empty().html(fnvalama);

                                $('.f3').val(0);
                                var fnvalama3 = 'Decor Cassette($0.00)';
                                $('.f3amval').empty().html(fnvalama3);

                                $('.f2').val(165);
                                var fnvalama2 = 'Valance($165.00)';
                                $('.f2amval').empty().html(fnvalama2);
                            }

                            $.ajax({
                                type : "POST",
                                url: "{{route('get_product_price')}}",
                                data : {
                                    '_token' : "{{csrf_token()}}",
                                    'width' : width,
                                    'length' : length,
                                    'schedule' : schedule,
                                    'catname' : catname,
                                },
                                success:function(data){
                                    console.log(data)
                                    var schedule_name = data.schedule_name;
                                    var n_price = Math.floor(data.regular_price);
                                    console.log("price is " +n_price)



                                    var catdis = $('.catdiscount').val();


                                    if (catdis == ""){
                                        var prrr = `<span class="discounted-price">$${n_price.toFixed(2)}</span>`;
                                        $('.pricecng').empty().html(prrr);
                                        $('.newPricepro').val(n_price);
                                        $('.latestprice').empty().val(n_price.toFixed(2));

                                    }else {

                                        var disprice = (n_price * catdis) / 100;
                                        var finalprice = n_price - disprice;
                                        console.log(finalprice)
                                        var prrr = `<span class="discounted-price">$${finalprice.toFixed(2)}</span>`;
                                        $('.pricecng').empty().html(prrr);
                                        $('.newPricepro').val(n_price.toFixed(2));

                                        $('.latestprice').empty().val(finalprice.toFixed(2));

                                    }
                                    $(".f1").prop("checked", false);
                                    $(".f3").prop("checked", false);
                                    $(".f2").prop("checked", false);

                                    if (schedule_name == "J"){
                                        if (width > 72 || length > 70 ){
                                            $('.deocr').hide();
                                        }else if(width < 72 || length < 72){
                                            $('.deocr').show();
                                        }
                                    }else{
                                        if (width > 72 || length > 72 ){
                                            $('.deocr').hide();
                                        }else if(width < 72 || length < 72){
                                            $('.deocr').show();
                                        }
                                    }
                                    $('.pricecng').show();

                                    var oldtotalrice = Math.floor($('.latestprice').val());
                                    $('.total').empty().append(`Total: $${oldtotalrice.toFixed(2)}`);
                                    $('.product_price').empty().append(`Product Price: ${oldtotalrice.toFixed(2)}`);

                                }
                            });
                        }



                    });

                    //*********end  withd










                    //*********length fraction
                    $('.lengthfrac').change(function () {
                        var lengt_val = $('.length').val();
                        var len_fr = $(this).val();
                        if (len_fr == 0){
                            var len_mins = parseInt(lengt_val) - parseInt(1);
                            if (len_mins < 36){
                                var length = (parseInt(lengt_val) + parseInt(1)) - parseInt(1);
                            }else {
                                var length = parseInt(lengt_val) - parseInt(1);
                            }
                        }else {
                            var length = parseInt(lengt_val) + parseInt(1);
                        }
                        // console.log(length)

                        var wid_frac = $('.widtfrac').val();
                        var wid_val = $('.width').val();
                        if (wid_frac == 0){
                            var wd_mins = parseInt(wid_val) - parseInt(1);
                            if (wd_mins < 24){
                                var width = (parseInt(wid_val) + parseInt(1)) - parseInt(1);
                                var wd = (parseInt(wid_val) + parseInt(1)) - parseInt(1);
                            }else {
                                var width = (parseInt(wid_val) + parseInt(1)) + parseInt(1);
                                var wd = (parseInt(wid_val) + parseInt(1)) + parseInt(1);
                            }
                        }else {
                            var width = parseInt(wid_val) + parseInt(1);
                            var wd = parseInt(wid_val) + parseInt(1);

                        }

                        console.log(width)
                        console.log(length)
                        console.log(wd)
                        var schedule = $('.schedulename').val();
                        var catname = $('.catname').val();


                        if(catname == 'Vision Blinds') {

                            if (wd == 24 && length > 72 ){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(16);
                                var fnvalama = 'Square or Louvolite fascia($16.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);

                                $('.option_price').empty().append(`Options Price: $16`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 25 && wd <= 30 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(20);
                                var fnvalama = 'Square or Louvolite fascia($20.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $20`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 31 && wd <= 36 && length > 72 ){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(24);
                                var fnvalama = 'Square or Louvolite fascia($24.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $24`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 37 && wd <= 42 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f1').val(28);
                                var fnvalama = 'Square or Louvolite fascia($28.00)';
                                $('.f1amval').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $28`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 43 && wd <= 48 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(32);
                                var fnvalama = 'Square or Louvolite fascia($32.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $32`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 49 && wd <= 54 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(36);
                                var fnvalama = 'Square or Louvolite fascia($36.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $36`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 55 && wd <= 60 && length > 72){
                                $('.loveria').show();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(40);
                                var fnvalama = 'Square or Louvolite fascia($40.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $40`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 61 && wd <= 66 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(44);
                                var fnvalama = 'Square or Louvolite fascia($44.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $44`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 67 && wd <= 72 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(48);
                                var fnvalama = 'Square or Louvolite fascia($48.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $48`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 73 && wd <= 84 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(56);
                                var fnvalama = 'Square or Louvolite fascia($56.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $56`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 85 && wd <= 96 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(64);
                                var fnvalama = 'Square or Louvolite fascia($64.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $64`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }

                            else {
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f1amvalvishon').hide();
                                $('.visionf1').hide();
                                $('.f1').val(0);
                                $('.f4').val(0);
                                $('.option_price').hide();
                                $('.addacc').hide();
                            }
                        }

                        $.ajax({
                            type : "POST",
                            url: "{{route('get_product_price')}}",
                            data : {
                                '_token' : "{{csrf_token()}}",
                                'width' : width,
                                'length' : length,
                                'schedule' : schedule,
                                'catname' : catname,
                            },
                            success:function(data){
                                console.log(data)
                                var schedule_name = data.schedule_name
                                var n_price = Math.floor(data.regular_price);

                                var prrr = `<span class="discounted-price">$${n_price.toFixed(2)}</span>`;
                                $('.pricecng').empty().html(prrr);
                                $('.newPricepro').val(data.regular_price);

                                if(catname != 'Vision Blinds'){
                                    if (schedule_name == "J"){
                                        if (width > 72 || length > 70 ){
                                            $('.deocr').hide();
                                        }else if(width < 72 || length < 72){
                                            $('.deocr').show();
                                        }
                                    }else{
                                        if (width > 72 || length > 72 ){
                                            $('.deocr').hide();
                                        }else if(width < 72 || length < 72){
                                            $('.deocr').show();
                                        }
                                    }
                                }



                                $('.pricecng').show();

                                var catdis = $('.catdiscount').val();


                                if(catname != 'Vision Blinds'){
                                    var oldprr = $('.newPricepro').val();
                                    var f1pr = $('.f1').val();
                                }else{
                                    var oldprr = $('.newPricepro').val();
                                    var f1pr = $('.f4').val();
                                }




                                var total =  parseInt(n_price) + parseInt(f1pr);


                                if (catdis == ""){
                                    var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                                    $('.pricecng').empty().html(prrr);

                                    $('.latestprice').empty().val(total.toFixed(2));

                                }else {
                                    var disprice = (total * catdis) / 100;
                                    var finalprice = total - disprice;

                                    var prrr = `<span class="discounted-price">$${finalprice.toFixed(2)}</span>`;
                                    $('.pricecng').empty().html(prrr);

                                    $('.latestprice').empty().val(finalprice.toFixed(2));

                                }



                                var oldtotalrice = $('.newPricepro').val();
                                $('.total').empty().append(`Total: $${total.toFixed(2)}`);
                                $('.product_price').empty().append(`Product Price: ${n_price.toFixed(2)}`);


                            }
                        });




                    })



                    //*********end length fraction








                    $('.length').change(function (e) {
                        e.preventDefault();
                        var width = $('.width').val();
                        var length = $('.length').val();
                        var schedule = $('.schedulename').val();
                        var catname = $('.catname').val();
                        var wd = $('.width').val();
                        if(catname == 'Vision Blinds') {

                            if (wd == 24 && length > 72 ){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(16);
                                var fnvalama = 'Square or Louvolite fascia($16.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);

                                $('.option_price').empty().append(`Options Price: $16`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 25 && wd <= 30 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(20);
                                var fnvalama = 'Square or Louvolite fascia($20.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $20`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 31 && wd <= 36 && length > 72 ){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(24);
                                var fnvalama = 'Square or Louvolite fascia($24.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $24`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 37 && wd <= 42 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f1').val(28);
                                var fnvalama = 'Square or Louvolite fascia($28.00)';
                                $('.f1amval').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $28`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 43 && wd <= 48 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(32);
                                var fnvalama = 'Square or Louvolite fascia($32.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $32`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 49 && wd <= 54 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(36);
                                var fnvalama = 'Square or Louvolite fascia($36.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $36`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 55 && wd <= 60 && length > 72){
                                $('.loveria').show();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(40);
                                var fnvalama = 'Square or Louvolite fascia($40.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $40`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 61 && wd <= 66 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(44);
                                var fnvalama = 'Square or Louvolite fascia($44.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $44`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 67 && wd <= 72 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(48);
                                var fnvalama = 'Square or Louvolite fascia($48.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $48`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 73 && wd <= 84 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(56);
                                var fnvalama = 'Square or Louvolite fascia($56.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $56`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }else if (wd >= 85 && wd <= 96 && length > 72){
                                $('.visionf1').show();
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f4').val(64);
                                var fnvalama = 'Square or Louvolite fascia($64.00)';
                                $('.f1amvalvishon').empty().html(fnvalama);
                                $('.option_price').empty().append(`Options Price: $64`);
                                $('.addacc').show();
                                $('.option_price').show();
                            }

                            else {
                                $('.loveria').hide();
                                $('.deocr').hide();
                                $('.valnce').hide();
                                $('.f1amvalvishon').hide();
                                $('.visionf1').hide();
                                $('.f1').val(0);
                                $('.f4').val(0);
                                $('.option_price').hide();
                                $('.addacc').hide();
                            }
                        }

                        $.ajax({
                            type : "POST",
                            url: "{{route('get_product_price')}}",
                            data : {
                                '_token' : "{{csrf_token()}}",
                                'width' : width,
                                'length' : length,
                                'schedule' : schedule,
                                'catname' : catname,
                            },
                            success:function(data){
                                console.log(data)
                                var schedule_name = data.schedule_name
                                var n_price = Math.floor(data.regular_price);

                                var prrr = `<span class="discounted-price">$${n_price.toFixed(2)}</span>`;
                                $('.pricecng').empty().html(prrr);
                                $('.newPricepro').val(data.regular_price);

                                if(catname != 'Vision Blinds'){
                                    if (schedule_name == "J"){
                                        if (width > 72 || length > 70 ){
                                            $('.deocr').hide();
                                        }else if(width < 72 || length < 72){
                                            $('.deocr').show();
                                        }
                                    }else{
                                        if (width > 72 || length > 72 ){
                                            $('.deocr').hide();
                                        }else if(width < 72 || length < 72){
                                            $('.deocr').show();
                                        }
                                    }
                                }



                                $('.pricecng').show();

                                var catdis = $('.catdiscount').val();


                                if(catname != 'Vision Blinds'){
                                    var oldprr = $('.newPricepro').val();
                                    var f1pr = $('.f1').val();
                                }else{
                                    var oldprr = $('.newPricepro').val();
                                    var f1pr = $('.f4').val();
                                }




                                var total =  parseInt(n_price) + parseInt(f1pr);


                                if (catdis == ""){
                                    var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                                    $('.pricecng').empty().html(prrr);

                                    $('.latestprice').empty().val(total.toFixed(2));

                                }else {
                                    var disprice = (total * catdis) / 100;
                                    var finalprice = total - disprice;

                                    var prrr = `<span class="discounted-price">$${finalprice.toFixed(2)}</span>`;
                                    $('.pricecng').empty().html(prrr);

                                    $('.latestprice').empty().val(finalprice.toFixed(2));

                                }



                                var oldtotalrice = $('.newPricepro').val();
                                $('.total').empty().append(`Total: $${total.toFixed(2)}`);
                                $('.product_price').empty().append(`Product Price: ${n_price.toFixed(2)}`);


                            }
                        });

                    });







                    $('.f1').click(function () {
                        var catname = $('.catname').val();

                        if (catname != 'Vision Blinds' ){
                            if($(this).is(":checked")){
                                var oldprr = $('.newPricepro').val();
                                var f1pr = $(this).val();

                                var npricee = $('.latestprice').val();
                                var nprice = Math.floor(npricee);

                                var total =  parseInt(nprice) + parseInt(f1pr);

                                var catdis = $('.catdiscount').val();
                                if (catdis == ""){
                                    var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                                    $('.pricecng').empty().html(prrr);

                                    $('.newPricepro').val(total.toFixed(2));

                                     $('.latestprice').val(total.toFixed(2));

                                }else {
                                    var disprice = (total * catdis) / 100;
                                    var finalprice = total - disprice;
                                    console.log(finalprice)
                                    var prrr = `<span class="discounted-price">$${finalprice.toFixed(2)}</span>`;
                                    $('.pricecng').empty().html(prrr);

                                    $('.newPricepro').val(total.toFixed(2));

                                     $('.latestprice').val(finalprice.toFixed(2));


                                }


                                var oldopprice = $('.optionPrice').val();
                                var newopprice = parseInt(oldopprice) + parseInt(f1pr);

                                $('.optionPrice').val(newopprice);
                                $('.option_price').empty().append(`Options Price: $${newopprice}`);

                                var oldtotalrice = $('.latestprice').val();
                                $('.total').empty().append(`Total: $${oldtotalrice}`);
                            }

                            if($(this).is(":not(:checked)")){
                                var oldprr = $('.newPricepro').val();
                                var nn_price = $('.latestprice').val();
                                var nprice = Math.floor(nn_price);

                                var f1pr = $(this).val();
                                var total =  parseInt(nprice) - parseInt(f1pr);
                                var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                                $('.pricecng').empty().html(prrr);

                                $('.newPricepro').val(total.toFixed(2));


                                var oldopprice = $('.optionPrice').val();
                                var newopprice = parseInt(oldopprice) - parseInt(f1pr);



                                $('.optionPrice').val(newopprice);
                                $('.option_price').empty().append(`Options Price: $${newopprice.toFixed(2)}`);

                                var oldtotalricee = $('.latestprice').val();
                                var oldtotalrice = Math.floor(oldtotalricee);
                                $('.total').empty().append(`Total: $${oldtotalrice.toFixed(2)}`);

                                var oldtotalricee = $('.latestprice').val();
                                var oldtotalrice = Math.floor(oldtotalricee);
                                $('.total').empty().append(`Total: $${oldtotalrice.toFixed(2)}`);

                                $('.latestprice').val(total.toFixed(2));

                            }
                        }



                    });


                    $('.f2').click(function () {

                        if($(this).is(":checked")){
                            var oldprr = $('.newPricepro').val();
                            var f2pr = $(this).val();

                            var npricee = $('.latestprice').val();
                            var nprice = Math.floor(npricee);

                            var total =  parseInt(nprice) + parseInt(f2pr);
                            var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                            $('.pricecng').empty().html(prrr);

                            $('.newPricepro').val(total.toFixed(2));
                            $('.latestprice').val(total.toFixed(2));


                            var oldopprice = $('.optionPrice').val();
                            var newopprice = parseInt(oldopprice) + parseInt(f2pr);

                            $('.optionPrice').val(newopprice);

                            $('.option_price').empty().append(`Options Price: $${newopprice}`);

                            var oldtotalrice = $('.latestprice').val();
                            $('.total').empty().append(`Total: $${oldtotalrice}`);
                        }
                        if($(this).is(":not(:checked)")){
                            var oldprr = $('.newPricepro').val();
                            var f2pr = $(this).val();

                            var npricee = $('.latestprice').val();
                            var nprice = Math.floor(npricee);

                            var total =  parseInt(nprice) - parseInt(f2pr);
                            var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                            $('.pricecng').empty().html(prrr);

                            $('.newPricepro').val(total);

                            $('.latestprice').val(total.toFixed(2));

                            var oldopprice = $('.optionPrice').val();
                            var newopprice = parseInt(oldopprice) - parseInt(f2pr);

                            $('.optionPrice').val(newopprice);
                            $('.option_price').empty().append(`Options Price: $${newopprice}`);

                            var oldtotalrice = $('.latestprice').val();
                            $('.total').empty().append(`Total: $${oldtotalrice}`);
                        }

                    });



                    $('.f3').click(function () {

                        if($(this).is(":checked")){
                            var oldprr = $('.newPricepro').val();
                            var f3pr = $(this).val();
                            var npricee = $('.latestprice').val();
                            var nprice = Math.floor(npricee);

                            var total =  parseInt(nprice) + parseInt(f3pr);
                            var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                            $('.pricecng').empty().html(prrr);

                            $('.newPricepro').val(total.toFixed(2));

                            $('.latestprice').val(total.toFixed(2));

                            var oldopprice = $('.optionPrice').val();
                            var newopprice = parseInt(oldopprice) + parseInt(f3pr);

                            $('.optionPrice').val(newopprice);
                            $('.option_price').empty().append(`Options Price: $${newopprice}`);

                            var oldtotalrice = $('.latestprice').val();
                            $('.total').empty().append(`Total: $${oldtotalrice}`);
                        }
                        if($(this).is(":not(:checked)")){
                            var oldprr = $('.newPricepro').val();
                            var f3pr = $(this).val();

                            var npricee = $('.latestprice').val();
                            var nprice = Math.floor(npricee);

                            var total =  parseInt(nprice) - parseInt(f3pr);
                            var prrr = `<span class="discounted-price">$${total.toFixed(2)}</span>`;
                            $('.pricecng').empty().html(prrr);

                            $('.newPricepro').val(total.toFixed());

                            $('.latestprice').val(total.toFixed(2));

                            var oldopprice = $('.optionPrice').val();
                            var newopprice = parseInt(oldopprice) - parseInt(f3pr);

                            $('.optionPrice').val(newopprice);
                            $('.option_price').empty().append(`Options Price: $${newopprice}`);

                            var oldtotalrice = $('.latestprice').val();
                            $('.total').empty().append(`Total: $${oldtotalrice}`);
                        }

                    });

                })
            </script>
@stop
