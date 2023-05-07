@extends('template')
@section('title', 'Product')
@section('content')
    <!-- Product section-->
    <div>
        <h1>Upload Product</h1>
        <form method="POST" action="/aboveAdmin/product/upload" class="btn btn-outline-dark mt-auto" enctype="multipart/form-data">
            @csrf
            <div>Product Image:<input type="file" name="image"></div>
            <div>Product Name:<input type="text" name="name"></div>
            <div>SKU:<input type="text" name="SKU"></div>
            <div>Product Description:<input type="text" name="description"></div>
            <button type="submit" class="btn btn-outline-none mt-auto">Upload Product</button>
        </form>
    </div>
@endsection
