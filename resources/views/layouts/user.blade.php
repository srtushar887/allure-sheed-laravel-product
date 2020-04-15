<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Feb 2020 07:38:23 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Abstack - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/admin/')}}/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if (!empty(Auth::user()->profile_image) )

                        <img src="{{asset(Auth::user()->profile_image)}}" alt="user-image" class="rounded-circle">
                    @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR04J071R0gl_ia0mXQ3QmKqVGuSMyoTHMUptegI4IZsMPZ5izX" alt="user-image" class="rounded-circle">
                    @endif
                    <span class="ml-1">{{Auth::user()->first_name}} {{Auth::user()->last_name}} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('user.profile')}}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Profile</span>
                    </a>


                    <!-- item-->
                    <a href="{{route('user.change.pass')}}" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Change Password</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>




        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('assets/admin/')}}/images/logo-light.png" alt="" height="16">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('assets/admin/')}}/images/logo-sm.png" alt="" height="28">
                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>



        </ul>
    </div>
    <!-- end Topbar -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Navigation</li>

                    <li>
                        <a href="{{route('home')}}">
                            <i class="fe-airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.billing.address')}}">
                            <i class="fe-airplay"></i>
                            <span> Billing Address </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('user.billing.address')}}">
                            <i class="fe-airplay"></i>
                            <span> Billing Address </span>
                        </a>
                    </li>



                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @yield('user')



            </div> <!-- end container-fluid -->

        </div> <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        2017 - 2019 &copy; Abstack theme by <a href="#">Coderthemes</a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('assets/admin/')}}/js/vendor.min.js"></script>

<!-- Chart JS -->
<script src="{{asset('assets/admin/')}}/libs/chart-js/Chart.bundle.min.js"></script>

<!-- Init js -->
<script src="{{asset('assets/admin/')}}/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/app.min.js"></script>
@yield('js')
</body>

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Feb 2020 07:39:42 GMT -->
</html>
