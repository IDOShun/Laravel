@extends('template')
@section('title', 'Product')
@section('content')
    <!-- Product section-->
    <div style="display:flex; justify-content: center;"><h3 style="color: red;">Do You Really Want To DELETE This Product?</h3></div>
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
    </section>
    <!-- Delete Confirmation -->
    <div style="display: flex; justify-content:space-around; width:50vw; margin-right: auto; margin-left:auto; margin-bottom: 2vh;">
        <form method="POST" action="{{route('post.delete')}}">@csrf<input name="confirm" type="hidden" value="true"><input name="id" type="hidden" value="{{$product->id}}"><button type="submit" class="btn btn-danger" style="width: 15vw; height:5vh">YES</button></form>
        <form method="POST" action="{{route('post.delete')}}">@csrf<input name="confirm" type="hidden" value="false"><input name="id" type="hidden" value="{{$product->id}}"><button type="submit" class="btn btn-primary" style="width: 15vw; height: 5vh;">NO</button></form>
    </div>
@endsection
