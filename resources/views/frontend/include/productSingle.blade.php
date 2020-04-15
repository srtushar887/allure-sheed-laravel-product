@foreach($product as $pro)
    <div class="col-12 col-lg-is-5 col-md-6 col-sm-6 mb-45 hot sale">
        <div class="single-product">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
                <a class="image-wrap" href="{{route('product.view',$pro->id)}}">
                    <img src="{{asset($pro->product_image)}}" style="height: 200px;width: 100%" class="img-fluid" alt="">
                    <img src="{{asset($pro->product_image)}}" style="height: 200px;width: 100%" class="img-fluid" alt="">
                </a>



                <div class="single-product__floating-icons">

{{--                    <span class="quickview"><a class="cd-trigger" href="#qv-1"  data-tippy="Quick View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left"  ><i class="ion-ios-search-strong"></i></a></span>--}}
                </div>


            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">

                <div class="title">
                    <h3> <a href="{{route('product.view',$pro->id)}}">{{$pro->product_name}}</a></h3>
                    <a href="{{route('product.view',$pro->id)}}">{{$pro->product_name}}</a>
                </div>
                <?php
                $min_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$pro->schedule_name)->min('regular_price');
                $max_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$pro->schedule_name)->max('regular_price');
                ?>
                <div class="price">
                    <span class="discounted-price">${{$min_amount}}</span> -
                    <span class="discounted-price">${{$max_amount}}</span>
                </div>
            </div>

            <!--=======  End of single product content  =======-->
        </div>
        <div class="single-product--list">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
                <a class="image-wrap" href="{{route('product.view',$pro->id)}}">
                    <img src="{{asset('assets/frontend/')}}/images/products/cloth-1-1-600x800.jpg" class="img-fluid" alt="">
                    <img src="{{asset('assets/frontend/')}}/images/products/cloth-1-2-600x800.jpg" class="img-fluid" alt="">
                </a>

                <div class="single-product__floating-badges">
                    <span class="onsale">-10%</span>
                    <span class="hot">hot</span>
                </div>

                <div class="single-product__floating-icons">
                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "bottom" ><i class="ion-android-favorite-outline"></i></a></span>

                    <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "bottom" ><i class="ion-ios-shuffle-strong"></i></a></span>

                    <span class="quickview"><a class="cd-trigger" href="#qv-1"  data-tippy="Quick View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "bottom"  ><i class="ion-ios-search-strong"></i></a></span>
                </div>

                <div class="single-product__variations">
                    <div class="size-container mb-5">
                        <span class="size">L</span>
                        <span class="size">M</span>
                        <span class="size">S</span>
                        <span class="size">XS</span>
                    </div>
                    <div class="color-container">
                        <span class="black"></span>
                        <span class="blue"></span>
                        <span class="yellow"></span>
                    </div>
                    <!-- <a href="#" class="clear-link">clear</a> -->
                </div>

            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">

                <div class="title">
                    <h3> <a href="shop-product-basic.html">High-waist Trousers</a></h3>
                </div>
                <div class="price">
                    <span class="main-price discounted">$160.00</span>
                    <span class="discounted-price">$180.00</span>
                </div>
                <p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
                </p>

                <a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

            </div>

            <!--=======  End of single product content  =======-->
        </div>
    </div>


@endforeach



<div class="ps-pagination text-center">
    <ul class="pagination">
        {{$product->links()}}
    </ul>
</div>

