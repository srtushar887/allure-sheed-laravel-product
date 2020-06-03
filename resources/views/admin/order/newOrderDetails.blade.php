@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Order Details : {{$user_order->orderid}}</h4>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">


                <form class="parsley-examples" action="{{route('admin.order.status.save')}}" method="post" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="userName">Status<span class="text-danger">*</span></label>
                            <input type="hidden" name="orderid" value="{{$user_order->id}}">
                            <select class="form-control" name="status">
                                <option value="0" {{$user_order->order_status == 0 ? "selected" : ''}}>Pending</option>
                                <option value="1" {{$user_order->order_status == 1 ? "selected" : ''}}>Approved</option>
                                <option value="2" {{$user_order->order_status == 2 ? "selected" : ''}}>Delivered</option>
                                <option value="3" {{$user_order->order_status == 3 ? "selected" : ''}}>Cancel</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->


    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Order List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>QTY</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $order =\App\order_product::where('order_id',$user_order->id)->with('product')->get();
                        ?>
                        @foreach($order as $ord)
                            <tr>
                                <td>{{$ord->product->product_name}}</td>
                                <td><img src="{{asset($ord->product->product_image)}}" style="height: 100px;width: 100px"></td>
                                <td>${{$ord->qty}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>


@stop
