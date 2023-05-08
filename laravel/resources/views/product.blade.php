@extends('template')
@section('title', 'Product')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset($product->image) }}" alt="Product Image" /></div>
                <div class="col-md-6">
                    <div class="small mb-1">SKU: {{$product->SKU}}</div>
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    {{-- <div class="fs-5 mb-5">
                    </div> --}}
                    <p class="lead">{{$product->description}}</p>
                </div>
                <!-- Merchant CAN Read Only -->
                @cannot('merchant')
                    <form method="POST" action="{{route('post.edit')}}" class="btn btn-outline-dark mt-auto">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}"/>
                        <button type="submit" class="btn btn-outline-none mt-auto">Edit Product</button>
                    </form>
                @endcan
            </div>
        </div>
    </section>
@endsection
