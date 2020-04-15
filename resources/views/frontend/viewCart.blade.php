@extends('layouts.frontend')
@section('front')
    <div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="breadcrumb-title">Shopping Cart</h1>

                    <!--=======  breadcrumb list  =======-->

                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
                        <li class="breadcrumb-list__item breadcrumb-list__item--active">shopping cart</li>
                    </ul>

                    <!--=======  End of breadcrumb list  =======-->

                </div>
            </div>
        </div>
    </div>



    <div class="shopping-cart-area mb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-30">
                    <!--=======  cart table  =======-->

                    <div class="cart-table-container">
                        <table class="cart-table">
                            <thead>
                            <tr>
                                <th class="product-name" colspan="2">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                            ?>
                            @if(count($carts) > 0)
                                @foreach($carts as $pro)
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="shop-product-basic.html">
                                        <img src="{{asset($pro->options->image)}}" class="img-fluid" alt="">
                                    </a>
                                </td>
                                <td class="product-name">
                                    <a href="shop-product-basic.html">{{$pro->name}}</a>
                                </td>

                                <td class="product-price"><span class="price">${{$pro->price}}</span></td>
                                <form action="{{route('cart.update')}}" method="get">
                                    @csrf
                                <td class="product-quantity">
                                    <div class="pro-qty d-inline-block mx-0">
                                        <input type="text"  name="qty" value="{{$pro->qty}}">

                                    </div>
                                    <input type="hidden" value="{{$pro->rowId}}" name="rowid">
                                </td>

                                <td class="total-price"><span class="price">${{$pro->subtotal()}}</span></td>

                                <td class="product-remove">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                                <td class="product-remove">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="ion-android-close"></i>
                                    </button>
                                </td>
                                </form>
                            </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No Cart Available</td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                    </div>

                    <!--=======  End of cart table  =======-->
                </div>


                <div class="col-xl-4 offset-xl-8 col-lg-5 offset-lg-7">
                    <div class="cart-calculation-area">
                        <h2 class="mb-40">Cart totals</h2>

                        <table class="cart-calculation-table mb-30">
                            <tr>
                                <th>SUBTOTAL</th>
                                <td class="subtotal">${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td class="total">${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</td>
                            </tr>
                        </table>

                        <div class="cart-calculation-button text-center">
                            <a href="{{route('checkout')}}">

                                <button class="lezada-button lezada-button--medium">proceed to checkout</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
