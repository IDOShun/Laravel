@extends('template')
@section('title', 'Product')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <form method="POST" action="/Product/Update" class="btn btn-outline-dark mt-auto">
                    @csrf
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/images/products{{'/'.$product->image}}" alt="Product Image" /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: <input type="text" value="{{$product->SKU}}" name="SKU"></div>
                        <h1 class="display-5 fw-bolder"><input type="text" value="{{$product->name}}" name="name"></h1>
                        <p class="lead"><input type="text" value="{{$product->description}}" name="description"></p>
                    </div>
                    <input type="hidden" name="id" value="{{$product->id}}"/>
                    <button type="submit" class="btn btn-outline-none mt-auto">Edit Product</button>
                </form>
            </div>
        </div>
    </section>
@endsection
