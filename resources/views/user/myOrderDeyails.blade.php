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
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders ID : {{$order_details->orderid}}</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Product Image</th>
                                                    <th>Optional</th>
                                                    <th>QTY</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                $order =\App\order_product::where('order_id',$order_details->id)
                                                    ->with('product')
                                                    ->get();
                                                ?>

                                                @foreach($order as $ord)
                                                    <tr>
                                                        <td>{{$ord->product->product_name}}</td>
                                                        <td><img src="{{asset($ord->product->product_image)}}" style="height: 50px;width: 50px"></td>
                                                        <td>
                                                            Addons:
                                                            <p>{{$ord->blinds1}}</p>
                                                            <br>
                                                            <p>{{$ord->blinds2}}</p>
                                                            <br>
                                                            <p>{{$ord->blinds3}}</p>
                                                            <br>
                                                            Widht:
                                                            <p>{{$ord->witdhtside}}</p>
                                                            <br>
                                                            Length
                                                            <p>{{$ord->legthside}}</p>
                                                            <br>
                                                        </td>
                                                        <td>{{$ord->qty}}</td>
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
