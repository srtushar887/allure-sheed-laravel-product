@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Deliver Order</h4>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Order List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_order as $ord)
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
                                <td><a href="{{route('userorder.details',$ord->id)}}" class="check-btn sqr-btn ">View Details</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$user_order->links()}}
                </div>
            </div>

        </div>

    </div>


@stop
