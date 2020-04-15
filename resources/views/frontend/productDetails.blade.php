@extends('layouts.frontend')
@section('css')

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
                                    $min_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$product_details->schedule_name)->min('regular_price');
                                    $max_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$product_details->schedule_name)->max('regular_price');
                                    ?>
                                    <div class="shop-product__price mb-30">
                                        <span class="discounted-price">${{$min_amount}}</span>-
                                        <span class="discounted-price">${{$max_amount}}</span>
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
                                                    <option>{{$wt->width}}</option>
                                                @endforeach
                                            </select>

                                        <select class="form-control twid_fra" name="witdhtside" style="margin-top: 0px;margin-left: 5px;">
                                            <option value="0" selected="" price="0">0</option>
                                            <option value="1/8" price="0">1/8</option>
                                            <option value="1/4" price="0">1/4</option>
                                            <option value="3/8" price="0">3/8</option>
                                            <option value="1/2" price="0">1/2</option>
                                            <option value="5/8" price="0">5/8</option>
                                            <option value="5/8" price="0">5/8</option>
                                            <option value="7/8" price="0">7/8</option>
                                        </select>




                                    </div>

                                    <div class="shop-product__brands mb-20">
                                        <div class="shop-product__block__title">Length: </div>
                                        <select class="form-control length">
                                            @foreach($length as $lt)
                                                <option>{{$lt->length}}</option>
                                            @endforeach
                                        </select>



                                        <select class="form-control twid_fra" name="legthside" style="margin-top: 0px;margin-left: 5px;">
                                            <option value="102336" selected="" price="0">0</option>
                                            <option value="1/8" price="0">1/8</option>
                                            <option value="1/4" price="0">1/4</option>
                                            <option value="3/8" price="0">3/8</option>
                                            <option value="1/2" price="0">1/2</option>
                                            <option value="5/8" price="0">5/8</option>
                                            <option value="5/8" price="0">5/8</option>
                                            <option value="7/8" price="0">7/8</option>
                                        </select>


                                    </div>

                                    <br>
                                    <div class="shop-product__price mb-30 pricecng">
                                        <span class="discounted-price">${{$max_amount}}</span>
                                    </div>
                                    <h4>Addon Accessories</h4>
                                    <div class="shop-product__block shop-product__block--size mb-20">
                                        <div class="shop-product__block__value">
                                            <div class="shop-product-size-list">
                                                <input type="checkbox" class="f1" id="blinds1" name="blinds1" value="80">
                                                <label for="vehicle1"> Square or Louvolite fascia ($80.00)</label>
                                                <br>
                                                <div class="deocr">
                                                    <input type="checkbox" class="f3" id="blinds2" name="blinds2" value="56">
                                                    <label for="vehicle2"> Decor Cassette ($56.00)</label>
                                                    <br>
                                                </div>

                                                <input type="checkbox" class="f2" id="blinds3" name="blinds3" value="48">
                                                <label for="vehicle3"> Valance ($48.00)</label>

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
                                                    <li class="mb-0 pt-0 pb-0 mr-10"><span class="product_price">Product Price: ${{$max_amount}}</span></li>
                                                    <br>
                                                    <li class="mb-0 pt-0 pb-0 mr-10"><span class="total">Total: ${{$max_amount}}</span></li>

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
                                        <input type="hidden" class="newPricepro" name="price" value="{{$max_amount}}" >
                                        <input type="hidden" class="optionPrice" value="0.00" >
                                        <input type="hidden" class="totalPrice" value="0.00" >
                                        <input type="hidden" class="proPrice" value="{{$max_amount}}" >
                                        <input type="hidden" class="proid" name="pro_id" value="{{$product_details->id}}" >
                                    </div>

                                    <!--=======  End of shop product quantity block  =======-->

                                    <!--=======  shop product buttons  =======-->

                                    <div class="shop-product__buttons mb-40">
                                        <button class="lezada-button lezada-button--medium">add to cart</button>
                                    </div>
                                    </form>

                                    <!--=======  End of shop product buttons  =======-->

                                    <!--=======  shop product brands  =======-->

                                    <div class="shop-product__brands mb-20">

                                        <a href="#">
                                            <img src="{{asset('assets/frontend/')}}/images/brands/brand-1.png" class="img-fluid" alt="">
                                        </a>

                                        <a href="#">
                                            <img src="{{asset('assets/frontend/')}}/images/brands/brand-2.png" class="img-fluid" alt="">
                                        </a>

                                    </div>

                                    <!--=======  End of shop product brands  =======-->

                                    <!--=======  other info table  =======-->

                                    <div class="quick-view-other-info pb-0">
                                        <table>
                                            <tr class="single-info">
                                                <td class="quickview-title">SKU: </td>
                                                <td class="quickview-value">12345</td>
                                            </tr>
                                            <tr class="single-info">
                                                <td class="quickview-title">Categories: </td>
                                                <td class="quickview-value">
                                                    <a href="#">Fashion</a>,
                                                    <a href="#">Men</a>,
                                                    <a href="#">Sunglasses</a>
                                                </td>
                                            </tr>
                                            <tr class="single-info">
                                                <td class="quickview-title">Tags: </td>
                                                <td class="quickview-value">
                                                    <a href="#">Fashion</a>,
                                                    <a href="#">Men</a>
                                                </td>
                                            </tr>
                                            <tr class="single-info">
                                                <td class="quickview-title">Share on: </td>
                                                <td class="quickview-value">
                                                    <ul class="quickview-social-icons">
                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <!--=======  End of other info table  =======-->
                                </div>

                                <!--=======  End of shop product description  =======-->
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
                                            <a class="nav-item nav-link" id="product-tab-2" data-toggle="tab" href="#product-series-2" role="tab" aria-selected="false">Additional information</a>
                                            <a class="nav-item nav-link" id="product-tab-3" data-toggle="tab" href="#product-series-3" role="tab" aria-selected="false">Reviews (3)</a>
                                        </div>
                                    </div>

                                    <!--=======  End of tab navigation  =======-->

                                    <!--=======  tab content  =======-->

                                    <div class="tab-content" id="nav-tabContent2">

                                        <div class="tab-pane fade show active" id="product-series-1" role="tabpanel" aria-labelledby="product-tab-1">
                                            <!--=======  shop product long description  =======-->

                                            <div class="shop-product__long-desc mb-30">
                                                <p>Hurley Dry-Fit Chino Short. Men’s chino short. Outseam Length: 19 Dri-FIT Technology helps keep you dry and comfortable. Made with sweat-wicking fabric. Fitted waist with belt loops. Button waist with zip fly provides a classic look and feel . Back welt pockets and coin pocket for storage. Dual side seam pockets. Heat transferred logos. 70% nylon 24% polyester 6% spandex. Imported.</p>
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



            $('.width').change(function (e) {
                e.preventDefault();
                var width = $('.width').val();
                var length = $('.length').val();
                var schedule = $('.schedulename').val();

                console.log(width);
                console.log(length);


                $.ajax({
                    type : "POST",
                    url: "{{route('get_product_price')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'width' : width,
                        'length' : length,
                        'schedule' : schedule,
                    },
                    success:function(data){
                        console.log(data);


                        var prrr = `<span class="discounted-price">$${data.regular_price}</span>`;
                        $('.pricecng').empty().html(prrr);
                        $('.newPricepro').val(data.regular_price);

                        $(".f1").prop("checked", false);
                        $(".f3").prop("checked", false);
                        $(".f2").prop("checked", false);

                        if (width > 72 || length > 72 ){
                            $('.deocr').hide();
                        }else if(width < 72 || length < 72){
                            $('.deocr').show();
                        }
                        $('.pricecng').show();

                        var oldtotalrice = $('.newPricepro').val();
                        $('.total').empty().append(`Total: $${oldtotalrice}`);
                        $('.product_price').empty().append(`Product Price: ${data.regular_price}`);

                    }
                });

            });



            $('.length').change(function (e) {
                e.preventDefault();
                var width = $('.width').val();
                var length = $('.length').val();
                var schedule = $('.schedulename').val();

                console.log(width);
                console.log(length);


                $.ajax({
                    type : "POST",
                    url: "{{route('get_product_price')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'width' : width,
                        'length' : length,
                        'schedule' : schedule,
                    },
                    success:function(data){
                        console.log(data);


                        var prrr = `<span class="discounted-price">$${data.regular_price}</span>`;
                        $('.pricecng').empty().html(prrr);
                        $('.newPricepro').val(data.regular_price);

                        $(".f1").prop("checked", false);
                        $(".f3").prop("checked", false);
                        $(".f2").prop("checked", false);

                        if (width > 72 || length > 72 ){
                            $('.deocr').hide();
                        }else if(width < 72 || length < 72){
                            $('.deocr').show();
                        }
                        $('.pricecng').show();

                        var oldtotalrice = $('.newPricepro').val();
                        $('.total').empty().append(`Total: $${oldtotalrice}`);
                        $('.product_price').empty().append(`Product Price: ${data.regular_price}`);

                    }
                });

            });







            $('.f1').click(function () {

                if($(this).is(":checked")){
                    var oldprr = $('.newPricepro').val();
                    var f1pr = $(this).val();
                    var total =  parseInt(oldprr) + parseInt(f1pr);
                    var prrr = `<span class="discounted-price">$${total}</span>`;
                    $('.pricecng').empty().html(prrr);

                    $('.newPricepro').val(total);


                    var oldopprice = $('.optionPrice').val();
                    var newopprice = parseInt(oldopprice) + parseInt(f1pr);

                    $('.optionPrice').val(newopprice);
                    $('.option_price').empty().append(`Options Price: $${newopprice}`);

                    var oldtotalrice = $('.newPricepro').val();
                    $('.total').empty().append(`Total: $${oldtotalrice}`);
                }

                if($(this).is(":not(:checked)")){
                    var oldprr = $('.newPricepro').val();
                    var f1pr = $(this).val();
                    var total =  parseInt(oldprr) - parseInt(f1pr);
                    var prrr = `<span class="discounted-price">$${total}</span>`;
                    $('.pricecng').empty().html(prrr);

                    $('.newPricepro').val(total);


                    var oldopprice = $('.optionPrice').val();
                    var newopprice = parseInt(oldopprice) - parseInt(f1pr);

                    $('.optionPrice').val(newopprice);
                    $('.option_price').empty().append(`Options Price: $${newopprice}`);

                    var oldtotalrice = $('.newPricepro').val();
                    $('.total').empty().append(`Total: $${oldtotalrice}`);

                    var oldtotalrice = $('.newPricepro').val();
                    $('.total').empty().append(`Total: $${oldtotalrice}`);
                }
            });


            $('.f2').click(function () {

                if($(this).is(":checked")){
                    var oldprr = $('.newPricepro').val();
                    var f2pr = $(this).val();
                    var total =  parseInt(oldprr) + parseInt(f2pr);
                    var prrr = `<span class="discounted-price">$${total}</span>`;
                    $('.pricecng').empty().html(prrr);

                    $('.newPricepro').val(total);

                    var oldopprice = $('.optionPrice').val();
                    var newopprice = parseInt(oldopprice) + parseInt(f2pr);

                    $('.optionPrice').val(newopprice);

                    $('.option_price').empty().append(`Options Price: $${newopprice}`);

                    var oldtotalrice = $('.newPricepro').val();
                    $('.total').empty().append(`Total: $${oldtotalrice}`);
                }
                if($(this).is(":not(:checked)")){
                    var oldprr = $('.newPricepro').val();
                    var f2pr = $(this).val();
                    var total =  parseInt(oldprr) - parseInt(f2pr);
                    var prrr = `<span class="discounted-price">$${total}</span>`;
                    $('.pricecng').empty().html(prrr);

                    $('.newPricepro').val(total);

                    var oldopprice = $('.optionPrice').val();
                    var newopprice = parseInt(oldopprice) - parseInt(f2pr);

                    $('.optionPrice').val(newopprice);
                    $('.option_price').empty().append(`Options Price: $${newopprice}`);

                    var oldtotalrice = $('.newPricepro').val();
                    $('.total').empty().append(`Total: $${oldtotalrice}`);
                }

            });



            $('.f3').click(function () {

                if($(this).is(":checked")){
                    var oldprr = $('.newPricepro').val();
                    var f3pr = $(this).val();
                    var total =  parseInt(oldprr) + parseInt(f3pr);
                    var prrr = `<span class="discounted-price">$${total}</span>`;
                    $('.pricecng').empty().html(prrr);

                    $('.newPricepro').val(total);

                    var oldopprice = $('.optionPrice').val();
                    var newopprice = parseInt(oldopprice) + parseInt(f3pr);

                    $('.optionPrice').val(newopprice);
                    $('.option_price').empty().append(`Options Price: $${newopprice}`);

                    var oldtotalrice = $('.newPricepro').val();
                    $('.total').empty().append(`Total: $${oldtotalrice}`);
                }
                if($(this).is(":not(:checked)")){
                    var oldprr = $('.newPricepro').val();
                    var f3pr = $(this).val();
                    var total =  parseInt(oldprr) - parseInt(f3pr);
                    var prrr = `<span class="discounted-price">$${total}</span>`;
                    $('.pricecng').empty().html(prrr);

                    $('.newPricepro').val(total);

                    var oldopprice = $('.optionPrice').val();
                    var newopprice = parseInt(oldopprice) - parseInt(f3pr);

                    $('.optionPrice').val(newopprice);
                    $('.option_price').empty().append(`Options Price: $${newopprice}`);

                    var oldtotalrice = $('.newPricepro').val();
                    $('.total').empty().append(`Total: $${oldtotalrice}`);
                }

            });

        })
    </script>
@stop
