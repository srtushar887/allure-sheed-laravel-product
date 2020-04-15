@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total Schedule</h5>
                <h3 class="mb-3" data-plugin="counterup">{{$total_schedule}}</h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total Product</h5>
                <h3 class="mb-3" data-plugin="counterup">{{$total_product}}</h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total New Orders</h5>
                <h3 class="mb-3" data-plugin="counterup">{{$total_new_order}}</h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total Approved Orders</h5>
                <h3 class="mb-3" data-plugin="counterup">{{$total_approbed_order}}</h3>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">{{$total_deliver_order}}</h5>
                <h3 class="mb-3" data-plugin="counterup">1,587</h3>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">{{$total_cancel_order}}</h5>
                <h3 class="mb-3" data-plugin="counterup">1,587</h3>
            </div>
        </div>
    </div>
@stop
