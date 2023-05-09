@extends('template')
@section('title', 'CRUD')
@section('content')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center" style="display: flex; justify-content: space-between;">
                @foreach ($users as $user)
                <div class="card" style="width: 20vw; margin-top:2vh;">
                    <div class="card-body">
                        <table class="table table-secondary table-striped table-hover table-bordered" style="border:1px solid gray">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">User ID</th>
                                    <th scope="col" style="text-align: right;">{{$user->id}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td style="text-align: right">{{$user->first_name}} {{$user->last_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Role</th>
                                    <td style="text-align: right">{{$user->role_id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Permission</th>
                                    <td style="text-align: right">{{$user->CRUD}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="display:flex; margin-left:auto; margin-right:auto; justify-content:center; margin-bottom: 1vh;">
                        <form method="POST" action="{{route('post.showUserPermission')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-success mt-auto">Edit Permission</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
