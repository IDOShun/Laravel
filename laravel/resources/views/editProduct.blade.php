@extends('template')
@section('title', 'Product')
@section('content')
    <!-- Show Error Messages If Any -->
    @include('alert')

    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">

                <!-- Only Admin who has 'Delete' permission Can -->
                @can('Delete')
                <div style="display:flex; width:60vw; margin-left:auto; margin-right:auto; justify-content:center; margin-bottom:2vh;">
                    <form action="{{route('post.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <button type="submit" class="btn btn-danger" style="color:black;"><b>Delete Product</b></button>
                    </form>
                </div>
                @endcan

                <!-- Only Admin who has 'Update' permission Can -->
                @can('Update')
                    <form method="POST" action="{{route('post.update')}}">
                        @csrf
                        <div class="col-md-6" style="display:flex; align-items: center; border: 2px solid black; width: 60vw;border-radius:10px; margin-right:auto; margin-left:auto;padding:2vw;background-color:rgb(233, 233, 219); justify-content: space-around;">
                            <div class="col-md-6" style="width:40%;height:50vh; border: 1px solid black;">
                                <img class="card-img-top mb-5 mb-md-0" src="{{ asset($product->image) }}" alt="Product Image" style="width:100%; height:100%;"/>
                            </div>
                            <div style="width:50%;height:100%;">
                                <table class="table table-secondary table-striped table-hover table-bordered" style="border:1px solid gray">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Attribution</th>
                                            <th scope="col">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">SKU</th>
                                            <td><input type="text" class="form-control" placeholder="SU22-JK-M-BL-000" value="{{$product->SKU}}" name="SKU"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Product Name</th>
                                            <td><input type="text" class="form-control" placeholder="Product Name" value="{{$product->name}}" name="name"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Description</th>
                                            <td><textarea class="form-control" name="description" rows="10">{{$product->description}}</textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="display:flex; width:60vw; margin-left:auto; margin-right:auto; justify-content:center; margin-top:2vh;">
                            <input type="hidden" name="id" value="{{$product->id}}"/>
                            <button type="submit" class="btn btn-success mt-auto" style="width: 20vw;">Edit Product</button>
                        </div>
                    </form>
                @endcan
            </div>
        </div>
    </section>
@endsection
