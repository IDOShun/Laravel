@extends('template')
@section('title', 'CRUD')
@section('content')
    @php
        // checking what permission the user has.
        $isCRUD = [false, false, false, false];
        $CRUD = $user->CRUD;
        $permission = [7,5,3,2];
        for($i=0; $i<count($permission); $i++){
            if(($CRUD % $permission[$i])==0){
                $isCRUD[$i] = true;
                $CRUD /= $permission[$i];
            }
        }
    @endphp
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5" style="width: 60vw;">
            <div style="display:flex; justify-content:center; margin-bottom: 2vh;">
                <div class="card" style="border:2px solid black; width: 30vw; margin-top:2vh; margin-left: auto; margin-right: auto;">
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
                                    <th scope="row">First_Name</th>
                                    <td style="text-align: right">{{$user->first_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Last_Name</th>
                                    <td style="text-align: right">{{$user->last_name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Role</th>
                                    <td style="text-align: right">{{$user->role_id}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Delete Confirmation -->
            <div style="display: flex; justify-content:space-around; width:50vw; margin-right: auto; margin-left:auto; margin-bottom: 2vh;">
                <form method="POST" action="{{route('post.deleteUser')}}">@csrf<input name="confirm" type="hidden" value="true"><input name="id" type="hidden" value="{{$user->id}}"><button type="submit" class="btn btn-danger" style="width: 15vw; height:5vh">YES</button></form>
                <form method="POST" action="{{route('post.deleteUser')}}">@csrf<input name="confirm" type="hidden" value="false"><input name="id" type="hidden" value="{{$user->id}}"><button type="submit" class="btn btn-primary" style="width: 15vw; height: 5vh;">NO</button></form>
            </div>
        </div>
    </section>
@endsection
