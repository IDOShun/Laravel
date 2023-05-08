@extends('template')
@section('title', 'CRUD')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                @foreach ($users as $user)
                    <form method="POST" action="/superAdmin/CRUD/Edit">
                        @csrf
                        <div class="col-md-6">
                            <div class="small mb-1">User Id:{{$user->id}}</div>
                            <div class="small mb-1">User Name:{{$user->first_name}} {{$user->last_name}}</div>
                            <div class="small mb-1">Role:{{$user->role_id}}</div>
                            <div class="small mb-1">Permission:{{$user->CRUD}}</div>
                        </div>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-outline-none mt-auto">Edit Permission</button>
                    </form>
                @endforeach
            </div>
        </div>
    </section>
@endsection
