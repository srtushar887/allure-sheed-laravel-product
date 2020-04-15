<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/frontend/new.js')}}"></script>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-xs-4 item-photo">
            <img style="max-width:100%;" src="https://ak1.ostkcdn.com/images/products/8818677/Samsung-Galaxy-S4-I337-16GB-AT-T-Unlocked-GSM-Android-Cell-Phone-85e3430e-6981-4252-a984-245862302c78_600.jpg" />
        </div>
        <div class="col-xs-5" style="border:0px solid gray">
            <!-- Datos del vendedor y titulo del producto -->
            <h3>{{$product_details->product_name}}</h3>


            <!-- Precios -->
            <h6 class="title-price"><small>PRECIO OFERTA</small></h6>
            <h3 style="margin-top:0px;">U${{$product_details->regular_price}}</h3>

            <!-- Detalles especificos del producto -->


            <div class="section" style="padding-bottom:20px;">
                <h6 class="title-attr"><small>CANTIDAD</small></h6>
                <?php
                    $withlem = \App\product::where('product_name',$product_details->product_name)->get();
                    $withlemm = \App\product::where('product_name',$product_details->product_name)->get();

                ?>
                <div>
                    <label>width</label>
                    <select class="form-control">
                        @foreach($withlem as $wid)
                        <option>{{$wid->width}}</option>
                            @endforeach
                    </select>
                    <label>Length</label>
                    <select class="form-control">
                        @foreach($withlemm as $len)
                        <option>{{$len->length}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Botones de compra -->
            <div class="section" style="padding-bottom:20px;">
                <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carro</button>
                <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> Agregar a lista de deseos</a></h6>
            </div>
        </div>

        <div class="col-xs-9">
            <ul class="menu-items">
                <li class="active">Detalle del producto</li>
                <li>Garantía</li>
                <li>Vendedor</li>
                <li>Envío</li>
            </ul>
            <div style="width:100%;border-top:1px solid silver">

            </div>
        </div>
    </div>
</div>
</body>
</html>
