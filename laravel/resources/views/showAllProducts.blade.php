<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $p)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset($p->image) }}" alt="Product Image" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$p->name}}</h5>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <form method="POST" action="{{route('post.product')}}" style="text-align: center">
                                @csrf
                                <input type="hidden" name="id" value="{{$p->id}}"/>
                                <button type="submit" class="btn btn-dark">Product Detail</button>
                            </form>
                            {{-- <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/Product/{{$p->id}}">Product Detail</a></div> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

