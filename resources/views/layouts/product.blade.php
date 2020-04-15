@foreach($product as $pro)
<div class="col-md-4">
    <div class="thumbnail">
        <img src="http://tech.firstpost.com/wp-content/uploads/2014/09/Apple_iPhone6_Reuters.jpg" alt="" class="img-responsive">
        <div class="caption">
            <h4 class="pull-right">${{$pro->regular_price}}</h4>
            <h4><a href="#">{{$pro->product_name}}</a></h4>
        </div>

        <div class="space-ten"></div>
        <div class="btn-ground text-center">
            <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
            <a href="{{route('product.view',$pro->id)}}">

                <button type="button" class="btn btn-primary" ><i class="fa fa-search"></i> Quick View</button>
            </a>
        </div>
        <div class="space-ten"></div>
    </div>
</div>
    @endforeach

{{$product->links()}}
