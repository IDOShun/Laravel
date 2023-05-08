@extends('template')
@section('title', 'Product')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <!-- Only Admin who has 'Delete' permission Can -->
                @can('Delete')
                    <form action="{{route('post.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <button type="submit" class="btn-primary">Delete Product</button>
                    </form>
                @endcan
                <!-- Only Admin who has 'Update' permission Can -->
                @can('Update')
                    <form method="POST" action="{{route('post.update')}}">
                        @csrf
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset($product->image) }}" alt="Product Image" /></div>
                        <div class="col-md-6">
                            <div class="small mb-1">SKU: <input type="text" value="{{$product->SKU}}" name="SKU"></div>
                            <h1 class="display-5 fw-bolder"><input type="text" value="{{$product->name}}" name="name"></h1>
                            <p class="lead"><input type="text" value="{{$product->description}}" name="description"></p>
                        </div>
                        <input type="hidden" name="id" value="{{$product->id}}"/>
                        <button type="submit" class="btn btn-outline-none mt-auto">Edit Product</button>
                    </form>
                @endcan
            </div>
        </div>
    </section>
@endsection
