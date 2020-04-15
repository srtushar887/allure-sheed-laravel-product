
@foreach($poduct as $pro)
<div id="sns_slider1_page2" class="sns-slider-wraps sns_producttaps_wraps">
    <h3 class="precar">{{$pro->category}}</h3>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#chair1" aria-controls="chair1" role="tab" data-toggle="tab">furniture</a></li>
        <li role="presentation"><a href="#table1" aria-controls="table1" role="tab" data-toggle="tab">kitchen</a></li>
        <li role="presentation"><a href="#ourdoor1" aria-controls="ourdoor1" role="tab" data-toggle="tab">living room</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="content-loading"></div>
        <div role="tabpanel" class="tab-pane active" id="chair1">
            <div class="detai-products1">
                <div class="products-grid">
                    <div  class="sns-slider-page1 item-row owl-carousel owl-theme" style="display: inline-block">

                        <?php
                            $all_pros = \App\product::distinct()->select('product_name')->where('category',$pro->category)->get();
                        ?>
                        @foreach($all_pros as $pros)
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <div class="ico-label">
                                            <span class="ico-product ico-sale">{{$pros->id}}</span>
                                        </div>
                                        <a class="product-image have-additional" href="{{route('product.view',$pros->product_name)}}" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/16.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="{{route('product.view',$pros->product_name)}}" title="Modular Modern"> {{$pros->product_name}} </a>
                                            </div>
                                            <div class="item-price">
{{--                                                <div class="price-box">--}}
{{--                                                                                <span class="regular-price">--}}
{{--                                                                                    <span class="price">--}}
{{--                                                                                        <span class="price1">$ {{$pros->regular_price}}</span>--}}
{{--                                                                                        <span class="price2">$ 600.00</span>--}}
{{--                                                                                    </span>--}}
{{--                                                                                </span>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
{{--                                                        <i class="fa fa-heart"></i>--}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
{{--                                                        <i class="fa fa-random"></i>--}}
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
{{--                                                            <i class="fa fa-eye"></i>--}}
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach


                    </div>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="table1">
            <div class="detai-products1">
                <div class="products-grid">
                    <div  class="sns-slider-page1 item-row owl-carousel owl-theme" style="display: inline-block">
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <div class="ico-label">
                                            <span class="ico-product ico-sale">Sale</span>
                                        </div>
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/29.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <div class="ico-label">
                                            <span class="ico-product ico-new">New</span>
                                            <span class="ico-product ico-sale">Sale</span>
                                        </div>
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/17.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/18.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <div class="ico-label">
                                            <span class="ico-product ico-new">New</span>
                                        </div>
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/19.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/11.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="ourdoor1">
            <div class="detai-products1">
                <div class="products-grid">
                    <div  class="sns-slider-page1 item-row owl-carousel owl-theme" style="display: inline-block">
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <div class="ico-label">
                                            <span class="ico-product ico-sale">Sale</span>
                                        </div>
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/9.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <div class="ico-label">
                                            <span class="ico-product ico-new">New</span>
                                            <span class="ico-product ico-sale">Sale</span>
                                        </div>
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/17.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/18.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <div class="ico-label">
                                            <span class="ico-product ico-new">New</span>
                                        </div>
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/19.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="prd">
                                    <div class="item-img clearfix">
                                        <a class="product-image have-additional" href="detail.html" title="Modular Modern">
                                                                        <span class="img-main">
                                                                            <img alt="" src="{{asset('assets/frontend/')}}/images/products/11.jpg">
                                                                        </span>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="detail.html" title="Modular Modern"> Modular Modern </a>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box">
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <span class="price1">$ 540.00</span>
                                                                                        <span class="price2">$ 600.00</span>
                                                                                    </span>
                                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-bot">
                                        <div class="wrap-addtocart">
                                            <button class="btn-cart" title="Add to Cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
                                        <div class="actions">
                                            <ul class="add-to-links">
                                                <li>
                                                    <a class="link-wishlist" title="Add to Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="link-compare" title="Add to Compare" href="#">
                                                        <i class="fa fa-random"></i>
                                                    </a>
                                                </li>
                                                <li class="wrap-quickview" data-id="qv_item_7">
                                                    <div class="quickview-wrap">
                                                        <a class="sns-btn-quickview qv_btn" href="#">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    @endforeach
