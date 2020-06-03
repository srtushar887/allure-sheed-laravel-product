@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">My Account</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">My Account</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>

    <div class="my-account-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            @include('user.include.menu')
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-12 col-md-12">
                            <br>
                            @if (Session::has('product_success'))
                                <h3 class="text-center">{{Session::get('alert_pass')}}</h3>
                            @endif

                            @if (Session::has('save_pass'))
                                <h3 class="text-center">{{Session::get('save_pass')}}</h3>
                            @endif
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($myorders as $ord)
                                                    <tr>
                                                        <td>{{$ord->order_id}}</td>
                                                        <td>{{$ord->created_at}}</td>
                                                        <td>
                                                            @if ($ord->order_status == 0)
                                                                Pending
                                                            @elseif($ord->order_status == 1)
                                                                Approved
                                                            @elseif($ord->order_status == 2)
                                                                Delivered
                                                            @else
                                                                Cancel
                                                            @endif

                                                        </td>
                                                        <td>${{$ord->order_total}}</td>
                                                        <td><a href="{{route('myorder.details',$ord->id)}}" class="check-btn sqr-btn ">View</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
