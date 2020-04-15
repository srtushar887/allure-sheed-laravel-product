@foreach($product as $pros)
    <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
        <div class="single-product">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
                <a class="image-wrap" href="{{route('product.view',$pros->id)}}">
                    <img src="{{asset($pros->product_image)}}" style="width: 100%;height: 200px" class="img-fluid" alt="">
                    <img src="{{asset($pros->product_image)}}" style="width: 100%;height: 200px" class="img-fluid" alt="">
                </a>



                <div class="single-product__floating-icons">

                    <span class="quickview"><a class="cd-trigger" href="#qv-2{{$pros->id}}"  data-tippy="Quick View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left"  ><i class="ion-ios-search-strong"></i></a></span>
                </div>


            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">

                <?php
                $min_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$pros->schedule_name)->min('regular_price');
                $max_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$pros->schedule_name)->max('regular_price');
                ?>
                <div class="title">
                    <h3> <a href="{{route('product.view',$pros->id)}}">{{$pros->product_name}}</a></h3>
                    <a href="{{route('product.view',$pros->id)}}">{{$pros->product_name}}</a>
                </div>
                <div class="price">
                    <span class="discounted-price">${{$min_amount}}</span> -
                    <span class="discounted-price">${{$max_amount}}</span>
                </div>
            </div>

            <!--=======  End of single product content  =======-->
        </div>
    </div>



    <div id="qv-2{{$pros->id}}" class="cd-quick-view">
        <div class="cd-slider-wrapper">
            <ul class="cd-slider">
                <li class="selected"><img src="{{asset($pros->product_image)}}" style="height: 100%" alt="Product 2"></li>
                <li><img src="{{asset($pros->product_image)}}" style="height: 100%" alt="Product 1"></li>
            </ul> <!-- cd-slider -->

            <ul class="cd-slider-pagination">
                <li class="active"><a href="#0">1</a></li>
                <li><a href="#1">2</a></li>
            </ul> <!-- cd-slider-pagination -->

            <ul class="cd-slider-navigation">
                <li><a class="cd-prev" href="#0">Prev</a></li>
                <li><a class="cd-next" href="#0">Next</a></li>
            </ul> <!-- cd-slider-navigation -->
        </div> <!-- cd-slider-wrapper -->

        <div class="lezada-item-info cd-item-info ps-scroll">

            <h2 class="item-title">{{$pros->product_name}}</h2>
            <p class="price">
                <span class="discounted-price">${{$min_amount}}</span> -
                <span class="discounted-price">${{$max_amount}}</span>
            </p>

            <p class="description">{!! $pros->short_description !!}</p>

            <span class="quickview-title">Quantity:</span>
            <div class="pro-qty d-inline-block mb-40">
                <input type="text" value="1">
            </div>

            <div class="add-to-cart-btn mb-25">

                <button class="lezada-button lezada-button--medium">add to cart</button>
            </div>

            <div class="quick-view-other-info">
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


        </div> <!-- cd-item-info -->
        <a href="#0" class="cd-close">Close</a>
    </div>
@endforeach



