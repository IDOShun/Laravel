@extends('template')
@section('title', 'Upload')
@section('content')

    <!-- Show Error Messages If Any -->
    @include('alert')


    <h1 style="text-align: center">Upload Product</h1>
    <!-- Product section-->
    <form method="POST" action="{{route('post.create')}}" enctype="multipart/form-data">
        @csrf
        <div style="display: flex; margin-left: auto; margin-right:auto; width:50vw; padding: 2vw; justify-content: center; margin-bottom: 1vh;">
            <table class="table table-secondary table-striped table-hover table-bordered" style="border:1px solid gray; width: 40vw;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Attribution</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Product Image</th>
                        <td><input type="file" class="form-control" name="image"></td>
                    </tr>
                    <tr>
                        <th scope="row">SKU</th>
                        <td><input type="text" class="form-control" placeholder="SU22-JK-M-BL-000" name="SKU"></td>
                    </tr>
                    <tr>
                        <th scope="row">Product Name</th>
                        <td><input type="text" class="form-control" placeholder="Product Name"name="name"></td>
                    </tr>
                    <tr>
                        <th scope="row">Product Description</th>
                        <td><textarea class="form-control" name="description" rows="2"></textarea></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="display:flex; width:60vw; margin-left:auto; margin-right:auto;justify-content:center; margin-bottom:4vh;">
            <button type="submit" class="btn btn-success mt-auto" style="width:20vw;">Upload Product</button>
        </div>
    </form>
@endsection
