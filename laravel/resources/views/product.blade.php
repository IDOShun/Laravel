@extends('template')
@section('title', 'Product')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5" style="display:flex; align-items: center; border: 2px solid black; width: 60vw;border-radius:10px; margin-right:auto; margin-left:auto;padding:2vw;justify-content: space-around;">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6" style="width:50%;height:50vh;">
                    <img src="{{ asset($product->image) }}" alt="Product Image"  style="width:100%; height:100%;"/>
                </div>
                <div class="col-md-6" style="height:50vh;">
                    <div class="small mb-1" style="text-align:left;">{{$product->SKU}}</div><br>
                    <h1 class="display-5 fw-bolder" style="text-align: center;">{{$product->name}}</h1>
                    <br><br>
                    <p class="lead" style="padding: 2vw;">{{$product->description}}</p>
                </div>
            </div>
        </div>
        <!-- Merchant CAN Read Only -->
        @cannot('merchant')
            <!-- CANNOT 'UPDATE' who dont have permission -->
            @cannot('Update')
                <div style="display:flex; justify-content: center;"><h3 style="color: red;">You Do Not Have Permission To 'UPDATE'.</h3></div>
            @endcan
            @can('Update')
                <div style="display:flex; width:60vw; margin-left:auto; margin-right:auto; justify-content:center; margin-top:2vh;">
                    <a href="{{route('get.edit')}}?uuid={{$product->uuid}}" class="btn btn-dark" style="width: 20vw;">Edit Product</a>
                </div>
            @endcan
        @endcan
    </section>
@endsection
