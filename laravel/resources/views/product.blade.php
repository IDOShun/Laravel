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
        <div style="display:flex; width:60vw; margin-left:auto; margin-right:auto; justify-content:center; margin-top:2vh;">
            <form method="POST" action="{{route('post.edit')}}">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}"/>
                <button type="submit" class="btn btn-success mt-auto" style="width: 20vw;">Edit Product</button>
            </form>
        </div>
        @endcan
    </section>
@endsection
