@foreach($product as $pro)
    <!--=======  single product  =======-->
    <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot sale">
        <div class="single-product">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
                <a class="image-wrap" href="{{route('product.view',$pro->id)}}">
                    @if (!empty($pro->product_image))
                        <img src="{{asset($pro->product_image)}}" style="height: 200px;width: 200px;" class="img-fluid" alt="">
                        <img src="{{asset($pro->product_image)}}" style="height: 200px;width: 200px;" class="img-fluid" alt="">
                    @else
                        <img src="https://viavii.com/assets/corals/images/default_product_image.png" style="height: 200px;width: 200px;" class="img-fluid" alt="">
                        <img src="https://viavii.com/assets/corals/images/default_product_image.png" style="height: 200px;width: 200px;" class="img-fluid" alt="">
                    @endif

                </a>



                <div class="single-product__floating-icons">
                    <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left" ><i class="ion-android-favorite-outline"></i></a></span>

                    {{--                                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left" ><i class="ion-ios-shuffle-strong"></i></a></span>--}}

                    {{--                                                <span class="quickview"><a class="cd-trigger" href="#product_details{{$pro->id}}"  data-tippy="Quick View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left"  ><i class="ion-ios-search-strong"></i></a></span>--}}
                </div>


            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">

                <div class="title">
                    <h3> <a href="{{route('product.view',$pro->id)}}">{{$pro->product_name}}</a></h3>
                    <a href="{{route('product.view',$pro->id)}}">select option</a>
                </div>
                <?php
                $min_array = array();

                $min_amount = \App\product_schedule::distinct()->select('regular_price')->where('schedule_name',$pro->schedule_name)->get();

                for ($i=0;$i<count($min_amount);$i++){
                    array_push($min_array,$min_amount[$i]['regular_price']);
                }

                ?>
                <div class="price">
                    <span class="discounted-price">${{min($min_array)}}</span>-
                    <span class="discounted-price">${{max($min_array)}}</span>
                </div>
            </div>

            <!--=======  End of single product content  =======-->
        </div>
        <div class="single-product--list">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
                <a class="image-wrap" href="{{route('product.view',$pro->id)}}">
                    @if (!empty($pro->product_image))
                        <img src="{{asset($pro->product_image)}}" style="height: 200px;width: 200px;" class="img-fluid" alt="">
                        <img src="{{asset($pro->product_image)}}" style="height: 200px;width: 200px;" class="img-fluid" alt="">
                    @else
                        <img src="https://viavii.com/assets/corals/images/default_product_image.png" style="height: 200px;width: 200px;" class="img-fluid" alt="">
                        <img src="https://viavii.com/assets/corals/images/default_product_image.png" style="height: 200px;width: 200px;" class="img-fluid" alt="">
                    @endif

                </a>



                <div class="single-product__floating-icons">
                    {{--                                                <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "bottom" ><i class="ion-android-favorite-outline"></i></a></span>--}}

                    {{--                                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "bottom" ><i class="ion-ios-shuffle-strong"></i></a></span>--}}

                    <span class="quickview"><a class="cd-trigger" href="#product_details{{$pro->id}}"  data-tippy="Quick View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "bottom"  ><i class="ion-ios-search-strong"></i></a></span>
                </div>


            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">

                <div class="title">
                    <h3> <a href="{{route('product.view',$pro->id)}}">{{$pro->product_name}}</a></h3>
                </div>
                <div class="price">
                    <span class="discounted-price">${{min($min_array)}}</span>-
                    <span class="discounted-price">${{max($min_array)}}</span>
                </div>
                <p class="short-desc"> {!! $pro->short_description !!}
                </p>

                <a href="{{route('product.view',$pro->id)}}" class="lezada-button lezada-button--medium">select option</a>

            </div>

            <!--=======  End of single product content  =======-->
        </div>
    </div>
    <!--=======  End of single product  =======-->






@endforeach

<div class="ps-pagination text-center">
    <ul class="pagination">
        {{$product->links()}}
    </ul>
</div>
