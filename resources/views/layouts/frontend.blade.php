<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.hasthemes.com/lezada-preview/lezada/index-trending.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 15:58:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$gn->site_name}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{asset($gn->icon)}}">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/frontend/')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link href="{{asset('assets/frontend/')}}/css/font-awesome.min.css" rel="stylesheet">

    <!-- Ionicons CSS -->
    <link href="{{asset('assets/frontend/')}}/css/ionicons.min.css" rel="stylesheet">

    <!-- Themify CSS -->
    <link href="{{asset('assets/frontend/')}}/css/themify-icons.css" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{asset('assets/frontend/')}}/css/plugins.css" rel="stylesheet">

    <!-- Helper CSS -->
    <link href="{{asset('assets/frontend/')}}/css/helper.css" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{asset('assets/frontend/')}}/css/main.css" rel="stylesheet">

    <!-- Revolution Slider CSS -->
    <link href="{{asset('assets/frontend/')}}/revolution/css/settings.css" rel="stylesheet">
    <link href="{{asset('assets/frontend/')}}/revolution/css/navigation.css" rel="stylesheet">
    <link href="{{asset('assets/frontend/')}}/revolution/custom-setting.css" rel="stylesheet">
    @yield('css')
    <!-- Modernizer JS -->
    <script src="{{asset('assets/frontend/')}}/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>


<!--=============================================
=            Header wide topbar         =
=============================================-->

<header class="header header-wide-topbar header-sticky">

    <!--=======  header top  =======-->

    <div class="header-top pt-10 pb-10">
        <div class="container wide">
            <!--=======  header top container  =======-->

            <div class="header-top-container">
                <!--=======  header top left  =======-->

                <div class="header-top-left">
                    <!--=======  language change =======-->



                    <!--=======  End of language change =======-->

                    <!--=======  header separator  =======-->



                    <!--=======  End of header separator  =======-->

                    <!--=======  currency change =======-->


                    <!--=======  End of currency change =======-->

                    <!--=======  header separator  =======-->

                    <span class="header-separator d-none d-lg-block">|</span>

                    <!--=======  End of header separator  =======-->

                    <!--=======  order online text  =======-->

                    <div class="order-online-text">
                        Order Online Call Us <a href="#"><span class="number">(0123) 456789</span></a>
                    </div>

                    <!--=======  End of order online text  =======-->

                </div>

                <!--=======  End of header top left  =======-->

                <!--=======  header top right  =======-->

                <div class="header-top-right">
                    <!--=======  top shop sropdown =======-->

                    <div class="top-shop-dropdown change-dropdown">
                        <a href="javascript:void(0)">Purchase Now</a>

                        <ul>
                            <li><a href="{{route('view.cart')}}">Shoping Cart</a></li>
                            <li><a href="{{route('checkout')}}">Checkout</a></li>
                        </ul>
                    </div>

                    <!--=======  End of top shop dropdown =======-->

                    <!--=======  header separator  =======-->

                    <span class="header-separator">|</span>

                    <!--=======  End of header separator  =======-->

                    <!--======= top newsletter subscription   =======-->

                    <div class="top-newsletter-subscription no-dropdown">
                        <a href="#">Newsletter Signup</a>
                    </div>

                    <!--=======  End of top newsletter subscription   =======-->

                    <!--=======  header separator  =======-->

                    <span class="header-separator">|</span>

                    <!--=======  End of header separator  =======-->

                    <!--=======  top social icons  =======-->

                    <div class="top-social-icons">
                        <ul>
                            <li><a href="http://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="http://www.youtube.com/"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>

                    <!--=======  End of top social icons  =======-->
                </div>

                <!--=======  End of header top right  =======-->
            </div>

            <!--=======  End of header top container  =======-->
        </div>
    </div>

    <!--=======  End of header top  =======-->

    <!--=======  header bottom  =======-->

    <div class="header-bottom pt-md-40 pb-md-40 pt-sm-40 pb-sm-40">
        <div class="container wide">


            <!--=======  header bottom container  =======-->

            <div class="header-bottom-container">

                <!--=======  logo with off canvas  =======-->

                <div class="logo-with-offcanvas d-flex">



                    <!--=======  logo   =======-->

                    <div class="logo">
                        <a href="{{route('shop')}}">
                            <img src="{{asset($gn->logo)}}" style="height: 50px;width: 175px" class="img-fluid" alt="">
                        </a>
                    </div>

                    <!--=======  End of logo   =======-->
                </div>

                <!--=======  End of logo with off canvas  =======-->

                <!--=======  header bottom navigation  =======-->

                <div class="header-bottom-navigation">
                    <div class="site-main-nav d-none d-lg-block">
                        <nav class="site-nav center-menu">
                            <ul>
{{--                                <li class="menu-item"><a href="{{route('front')}}">Home</a>--}}
{{--                                </li>--}}
                                <?php
                                $categories = \App\product::distinct()->select('category')->get();
                                ?>
                                <li class="menu-item-has-children"><a href="{{route('shop')}}">Shop</a>
                                    <ul class="sub-menu single-column-menu">
                                        @foreach($categories as $fcat)
                                            <li><a href="{{route('category.product',$fcat->category)}}">{{$fcat->category}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
{{--                                <li class="menu-item"><a href="{{route('shop')}}">Shop</a>--}}
                                </li>
                                <li class="menu-item"><a href="{{route('about.us')}}">About Us</a>
                                </li>
                                <li class="menu-item"><a href="{{route('contact.us')}}">Contact Us</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>

                <!--=======  End of header bottom navigation  =======-->

                <!--=======  headeer right container  =======-->

                <div class="header-right-container">

                    <!--=======  header right icons  =======-->

                    <div class="header-right-icons d-flex justify-content-end align-items-center h-100">
                        <!--=======  single-icon  =======-->

                        <div class="single-icon search">
                            <a href="javascript:void(0)" id="search-icon">
                                <i class="ion-ios-search-strong"></i>
                            </a>
                        </div>

                        <!--=======  End of single-icon  =======-->
                        <!--=======  single-icon  =======-->

                        <div class="single-icon user-login">
                            <a href="{{route('home')}}">
                                <i class="ion-android-person"></i>
                            </a>
                        </div>

                        <!--=======  End of single-icon  =======-->
                        <!--=======  single-icon  =======-->



                        <!--=======  End of single-icon  =======-->
                        <!--=======  single-icon  =======-->
                        <?php
                        $total_carta = \Gloudemans\Shoppingcart\Facades\Cart::subTotal();
                        $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                        ?>
                        <div class="single-icon cart">
                            <a href="javascript:void(0)" id="offcanvas-cart-icon">
                                <i class="ion-ios-cart"></i>
                                <span class="count">{{$counts}}</span>
                            </a>
                        </div>

                        <div class="single-icon wishlist">
                            <a href="javascript:void(0)" id="offcanvas-wishlist-icon">
                                <i class="ion-android-favorite-outline"></i>
                                <span class="count">0</span>
                            </a>
                        </div>
                        <!--=======  End of single-icon  =======-->
                    </div>
                    <!--=======  End of header right icons  =======-->

                </div>

                <!--=======  End of headeer right container  =======-->


            </div>

            <!--=======  End of header bottom container  =======-->

            <!-- Mobile Navigation Start Here -->

            <div class="site-mobile-navigation d-block d-lg-none">
                <div id="dl-menu" class="dl-menuwrapper site-mobile-nav">
                    <!--Site Mobile Menu Toggle Start-->
                    <button class="dl-trigger hamburger hamburger--spin">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
                    </button><!--Site Mobile Menu Toggle End-->
                    <ul class="dl-menu dl-menu-toggle">
                        <li class=""><a href="#">Home</a>
                            <ul class="dl-submenu">
                                <li class=""> <a href="#">Home Group One</a>
                                    <ul class="dl-submenu">
                                        <li><a href="index-trending.html">Trending</a></li>
                                        <li><a href="index-collection.html">My collection</a></li>
                                        <li><a href="index-special.html">Special</a></li>
                                        <li><a href="index-concept.html">concept</a></li>
                                        <li><a href="index-smart.html">smart design</a></li>
                                    </ul>
                                </li>
                                <li> <a href="#">Home Group Two</a>
                                    <ul class="dl-submenu">
                                        <li><a href="index-furniture.html">Furniture </a></li>
                                        <li><a href="index-essentials.html">Essentials</a></li>
                                        <li><a href="index-lookbook.html">Lookbook</a></li>
                                        <li><a href="index-wearables.html">Wearables</a></li>
                                        <li><a href="index-accessories.html">Accessories</a></li>
                                    </ul>
                                </li>
                                <li> <a href="#">Home Group three</a>
                                    <ul class="dl-submenu">
                                        <li><a href="index-shoppable.html">Shoppable</a></li>
                                        <li><a href="index-instagram.html">Instagram Shop</a></li>
                                        <li><a href="index-fashion.html">Fashion</a></li>
                                        <li><a href="index-perfumes.html">Perfumes</a></li>
                                        <li><a href="index-cosmetics.html">Cosmetics</a></li>
                                    </ul>
                                </li>
                                <li> <a href="#">Home Group four</a>
                                    <ul class="dl-submenu">
                                        <li><a href="index-decor.html">Home Decor</a></li>
                                        <li><a href="index-creative.html">Creative</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li><a href="#">Shop</a>
                            <ul class="dl-submenu">
                                <li class=""> <a href="#">Shop Pages</a>
                                    <ul class="dl-submenu">
                                        <li><a href="shop-no-sidebar.html">Shop No Sidebar</a></li>
                                        <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                        <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                        <li><a href="shop-fullwidth-no-space.html">Shop Fullwidth No Space</a></li>
                                        <li><a href="shop-fullwidth-no-sidebar.html">Shop Fullwidth No Sidebar</a></li>
                                        <li><a href="shop-fullwidth-left-sidebar.html">Shop Fullwidth Left Sidebar</a></li>
                                        <li><a href="shop-fullwidth-right-sidebar.html">Shop Fullwidth Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class=""> <a href="#">Product Details Pages</a>
                                    <ul class="dl-submenu">
                                        <li><a href="shop-product-basic.html">Basic </a></li>
                                        <li><a href="shop-product-fullwidth.html">Fullwidth</a></li>
                                        <li><a href="shop-product-sticky-details.html">Sticky details</a></li>
                                        <li><a href="shop-product-with-sidebar.html">With Sidebar</a></li>
                                        <li><a href="shop-product-extra-content.html">Extra Content</a></li>
                                        <li><a href="shop-product-variation-image.html">Variation Image</a></li>
                                        <li><a href="shop-product-bought-together.html">Bought Together</a></li>


                                    </ul>
                                </li>
                                <li class=""> <a href="#">Other Shop Pages</a>
                                    <ul class="dl-submenu">
                                        <li><a href="shop-product-with-background.html">Product with background</a></li>
                                        <li><a href="shop-cart.html">Shopping Cart</a></li>
                                        <li><a href="shop-checkout.html">Checkout</a></li>
                                        <li><a href="shop-order-tracking.html">Order Tracking</a></li>
                                        <li><a href="shop-wishlist.html">Wishlist</a></li>
                                        <li><a href="shop-customer-login.html">Customer Login</a></li>
                                        <li><a href="shop-by-brand.html">Shop by Brand</a></li>

                                    </ul>
                                </li>


                            </ul>
                        </li>
                        <li><a href="#">Elements</a>
                            <ul class="dl-submenu">
                                <li class=""> <a href="#">Shop / Products</a>
                                    <ul class="dl-submenu">
                                        <li><a href="element-product-categories.html">Product Categories</a></li>
                                        <li><a href="element-product-sliders.html">Product Sliders</a></li>
                                        <li><a href="element-product-tabs.html">Product Tabs</a></li>
                                        <li><a href="element-product-widget.html">Product Widget</a></li>
                                        <li><a href="element-recent-products.html">Recent Products</a></li>
                                    </ul>
                                </li>
                                <li class=""> <a href="#">Shop / Products</a>
                                    <ul class="dl-submenu">
                                        <li><a href="element-sale-products.html">Sale Products </a></li>
                                        <li><a href="element-featured-products.html">Featured products</a></li>
                                        <li><a href="element-top-rated-products.html">Top Rated products</a></li>
                                        <li><a href="element-bestselling-products.html">Best Selling products</a></li>
                                        <li><a href="element-product-attributes.html">Product Attributes</a></li>
                                    </ul>
                                </li>
                                <li class=""> <a href="#">Theming</a>
                                    <ul class="dl-submenu">
                                        <li><a href="element-blog-posts.html">Blog Posts</a></li>
                                        <li><a href="element-mailchimp-form.html">Mailchimp Form</a></li>
                                        <li><a href="element-icon-box.html">Icon Box</a></li>
                                        <li><a href="element-team-member.html">Team Member</a></li>
                                        <li><a href="element-instagram.html">Instagram</a></li>

                                    </ul>
                                </li>


                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul class="dl-submenu">
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="about-us-2.html">About Us 2</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="faq.html">F.A.Q</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="my-account.html">My account</a></li>
                                <li><a href="compare.html">Compare</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog</a>
                            <ul class="dl-submenu">
                                <li><a href="#">Standard Layout</a>
                                    <ul class="dl-submenu">
                                        <li><a href="blog-standard-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="blog-standard-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-standard-full-width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Grid Layout</a>
                                    <ul class="dl-submenu">
                                        <li><a href="blog-grid-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="blog-grid-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-grid-full-width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">List Layout</a>
                                    <ul class="dl-submenu">
                                        <li><a href="blog-list-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="blog-list-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-list-full-width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Masonry Layout</a>
                                    <ul class="dl-submenu">
                                        <li><a href="blog-masonry-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="blog-masonry-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-masonry-full-width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">1st Full Then Grid</a>
                                    <ul class="dl-submenu">
                                        <li><a href="blog-full-then-grid-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="blog-full-then-grid-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-full-then-grid-full-width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Single Post Layout</a>
                                    <ul class="dl-submenu">
                                        <li><a href="blog-single-post-right-sidebar.html">Right Sidebar</a></li>
                                        <li><a href="blog-single-post-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="blog-single-post-full-width.html">Full Width</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Mobile Navigation End Here -->


        </div>
    </div>

    <!--=======  End of header bottom  =======-->
</header>

<!--===== End of Header wide topbar ======-->
@yield('front')
<!--=============================================
=            footer top         =
=============================================-->

<div class="footer-top mb-50 mb-md-80 mb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  footer top container  =======-->

                <div class="footer-top-container">
                    <!--=======  single footer top widget  =======-->

                    <div class="footer-top-single-widget">
                        <h4 class="footer-top-widget-title">FREE SHIPPING</h4>
                        <div class="content">
                            <p>On all orders over $75.00</p>
                        </div>
                    </div>
                    <div class="footer-top-single-widget">
                        <h4 class="footer-top-widget-title">FREE RETURNS</h4>
                        <div class="content">
                            <p>30 days money back guarantee</p>
                        </div>
                    </div>
                    <div class="footer-top-single-widget">
                        <h4 class="footer-top-widget-title">SECURE PAYMENT</h4>
                        <div class="content">
                            <img src="{{asset('assets/frontend/')}}/images/icons/pay.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <!--=======  End of single footer top widget  =======-->
                </div>

                <!--=======  End of footer top container  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of footer top  ======-->


<!--=============================================
=            footer area         =
=============================================-->

<div class="footer-container footer-one pt-100 pb-50">
    <div class="container wide">
        <div class="row">
            <div class="col footer-single-widget">
                <!--=======  copyright text  =======-->
                <!--=======  logo  =======-->

                <div class="logo">
                    <img src="{{asset($gn->logo)}}" class="img-fluid" alt="">
                </div>

                <!--=======  End of logo  =======-->

                <!--=======  copyright text  =======-->

                <div class="copyright-text">
                    <?php
                        $date = \Carbon\Carbon::now()->format('Y');
                    ?>
                    <p> &copy; {{$date}} {{$gn->site_name}}.  <span>All Rights Reserved</span></p>
                </div>

                <!--=======  End of copyright text  =======-->

                <!--=======  End of copyright text  =======-->
            </div>
            <div class="col footer-single-widget">
                <!--=======  single widget  =======-->
                <h5 class="widget-title">ABOUT</h5>

                <!--=======  footer navigation container  =======-->

                <div class="footer-nav-container">
                    <nav>
                        <ul>
                            <li><a href="{{route('about.us')}}">About us</a></li>
                            <li><a href="{{route('contact.us')}}">Contact</a></li>
                            <li><a href="#">Orders tracking</a></li>
                        </ul>
                    </nav>
                </div>

                <!--=======  End of footer navigation container  =======-->

                <!--=======  single widget  =======-->
            </div>
            <div class="col footer-single-widget">
                <!--=======  single widget  =======-->
                <h5 class="widget-title">USEFUL LINKS</h5>

                <!--=======  footer navigation container  =======-->

                <div class="footer-nav-container">
                    <nav>
                        <ul>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Check Out</a></li>
                        </ul>
                    </nav>
                </div>

                <!--=======  End of footer navigation container  =======-->

                <!--=======  single widget  =======-->
            </div>

            <div class="col footer-single-widget">
                <!--=======  single widget  =======-->
                <h5 class="widget-title">FOLLOW US ON</h5>

                <!--=======  footer navigation container  =======-->

                <div class="footer-nav-container footer-social-links">
                    <nav>
                        <ul>
                            <li><a href="http://twitter.com/"><i class="fa fa-twitter"></i> Twitter</a></li>
                            <li><a href="http://facebook.com/"> <i class="fa fa-facebook"></i> Facebook</a></li>
                            <li><a href="http://instagram.com/"><i class="fa fa-instagram"></i> Instagram</a></li>
                            <li><a href="http://youtube.com/"> <i class="fa fa-youtube"></i> Youtube</a></li>
                        </ul>
                    </nav>
                </div>

                <!--=======  End of footer navigation container  =======-->


                <!--=======  single widget  =======-->
            </div>
            <div class="col footer-single-widget">
                <!--=======  single widget  =======-->

                <div class="footer-subscription-widget">
                    <h2 class="footer-subscription-title">Subscribe.</h2>
                    <p class="subscription-subtitle">Subscribe to our newsletter to receive news on update.</p>

                    <!--=======  subscription form  =======-->

                    <div class="subscription-form">
                        <form id="mc-form" class="mc-form">
                            <input type="email" placeholder="Your email address" required>
                            <button type="submit"><i class="ion-ios-arrow-thin-right"></i></button>
                        </form>
                    </div>

                    <!--=======  End of subscription form  =======-->

                    <!-- mailchimp-alerts Start -->

                    <div class="mailchimp-alerts">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div><!-- mailchimp-alerts end -->

                </div>

                <!--=======  End of single widget  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of footer area  ======-->


<!--=============================================
=            overlay items         =
=============================================-->

<!--=======  about overlay  =======-->

<div class="header-offcanvas about-overlay" id="about-overlay">
    <div class="overlay-close inactive"></div>
    <div class="overlay-content">

        <!--=======  close icon  =======-->

        <span class="close-icon" id="about-close-icon">
				<a href="javascript:void(0)">
					<i class="ti-close"></i>
				</a>
			</span>

        <!--=======  End of close icon  =======-->

        <!--=======  overlay content container  =======-->

        <div class="overlay-content-container d-flex flex-column justify-content-between h-100">
            <!--=======  widget wrapper  =======-->

            <div class="widget-wrapper">
                <!--=======  single widget  =======-->

                <div class="single-widget">
                    <h2 class="widget-title">About Us</h2>
                    <p>At Lezada, we put a strong emphasis on simplicity, quality and usefulness of fashion products over other factors. Our fashion items never get outdated. They are not short-lived as normal fashion clothes.</p>
                </div>

                <!--=======  End of single widget  =======-->
            </div>

            <!--=======  End of widget wrapper  =======-->

            <!--=======  contact widget  =======-->

            <div class="contact-widget">
                <p class="email"><a href="mailto:contact@lezada.com">contact@lezada.com</a></p>
                <p class="phone">(+00) 123 567990</p>

                <div class="social-icons">
                    <ul>
                        <li><a href="http://www.twitter.com/" data-tippy="Twitter" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="http://www.facebook.com/" data-tippy="Facebook" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"  target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://www.instagram.com/" data-tippy="Instagram" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="http://www.youtube.com/" data-tippy="Youtube" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div>
            </div>

            <!--=======  End of contact widget  =======-->
        </div>

        <!--=======  End of overlay content container  =======-->
    </div>
</div>

<!--=======  End of about overlay  =======-->

<!--=======  wishlist overlay  =======-->

<!--=======  End of wishlist overlay  =======-->

<!--=======  cart overlay  =======-->

<div class="cart-overlay" id="cart-overlay">
    <div class="cart-overlay-close inactive"></div>
    <div class="cart-overlay-content">
        <!--=======  close icon  =======-->

        <span class="close-icon" id="cart-close-icon">
				<a href="javascript:void(0)">
					<i class="ion-android-close"></i>
				</a>
			</span>

        <!--=======  End of close icon  =======-->

        <!--=======  offcanvas cart content container  =======-->

        <div class="offcanvas-cart-content-container">
            <h3 class="cart-title">Cart</h3>

            <div class="cart-product-wrapper">
                <div class="cart-product-container  ps-scroll">
                    <!--=======  single cart product  =======-->
                    <?php
                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                    ?>
                    @if(count($carts) > 0)
                        @foreach($carts as $pro)
                    <div class="single-cart-product">
							<span class="cart-close-icon">
								<a href="{{route('cart.delete',$pro->rowId)}}"><i class="ti-close"></i></a>
							</span>
                        <div class="image">
                            <a href="{{route('product.view',$pro->id)}}">
                                <img src="{{asset($pro->options->image)}}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="content">
                            <h5><a href="{{route('product.view',$pro->id)}}">{{$pro->name}}</a></h5>
                            <p><span class="cart-count">{{$pro->qty}} x </span> <span class="discounted-price">${{$pro->price}}</span></p>

                        </div>
                    </div>
                        @endforeach
                    @else

                        @endif

                    <!--=======  End of single cart product  =======-->
                </div>

                <!--=======  subtotal calculation  =======-->

                <p class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount">${{ \Gloudemans\Shoppingcart\Facades\Cart::subTotal()}}</span>
                </p>

                <!--=======  End of subtotal calculation  =======-->

                <!--=======  cart buttons  =======-->

                <div class="cart-buttons">
                    <a href="{{route('view.cart')}}">view cart</a>
                    <a href="{{route('checkout')}}">checkout</a>
                </div>

                <!--=======  End of cart buttons  =======-->

                <!--=======  free shipping text  =======-->


                <!--=======  End of free shipping text  =======-->
            </div>
        </div>

        <!--=======  End of offcanvas cart content container   =======-->
    </div>
</div>

<!--=======  End of cart overlay  =======-->


<!--=======  search overlay  =======-->

<div class="search-overlay" id="search-overlay">

    <!--=======  close icon  =======-->

    <span class="close-icon search-close-icon">
			<a href="javascript:void(0)"  id="search-close-icon">
				<i class="ti-close"></i>
			</a>
		</span>

    <!--=======  End of close icon  =======-->

    <!--=======  search overlay content  =======-->

    <div class="search-overlay-content">
        <div class="input-box">
            <form action="http://demo.hasthemes.com/lezada-preview/lezada/index.html">
                <input type="search" placeholder="Search Products...">
            </form>
        </div>
        <div class="search-hint">
            <span># Hit enter to search or ESC to close</span>
        </div>
    </div>

    <!--=======  End of search overlay content  =======-->
</div>

<!--=======  End of search overlay  =======-->

<!--=====  End of overlay items  ======-->

<!--=============================================
=            quick view         =
=============================================-->

<!--=====  End of quick view  ======-->

<!-- scroll to top  -->
<a href="#" class="scroll-top"></a>
<!-- end of scroll to top -->

<!-- JS
============================================ -->
<!-- jQuery JS -->
<script src="{{asset('assets/frontend/')}}/js/vendor/jquery.min.js"></script>

<!-- Popper JS -->
<script src="{{asset('assets/frontend/')}}/js/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>

<!-- Plugins JS -->
<script src="{{asset('assets/frontend/')}}/js/plugins.js"></script>

<!-- Main JS -->
<script src="{{asset('assets/frontend/')}}/js/main.js"></script>

<!-- Revolution Slider JS -->
<script src="{{asset('assets/frontend/')}}/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{asset('assets/frontend/')}}/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{asset('assets/frontend/')}}/revolution/revolution-active.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{asset('assets/frontend/')}}/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/')}}/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/')}}/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/')}}/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/')}}/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="{{asset('assets/frontend/')}}/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
@yield('js')


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5eb39303a1bad90e54a27147/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>


<!-- Mirrored from demo.hasthemes.com/lezada-preview/lezada/index-trending.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 15:59:01 GMT -->
</html>
