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

                @if (Auth::guard('user')->id() != $user->id)
                <div style="display:flex; justify-content:center;">
                    <form action="{{route('post.deleteUser.confirm')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class="btn btn-danger" type="submit" style="width:10vw;">Delete User Info</button>
                    </form>
                </div>
                @endif
            <div style="display:flex; justify-content:center;">
                <form method="POST" action="{{route('post.editPermission')}}">
                    @csrf
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
                                    <tr>
                                        <th scope="row">Permission :</th>
                                        <td>
                                            <input type="checkbox" name="CRUD[]" value="C" id="C"
                                            @if ($isCRUD[3])
                                            checked
                                            @endif>
                                            <label for="C">Create</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <input type="checkbox" name="CRUD[]" value="R" id="R" checked disabled>
                                            <label for="R">Read</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <input type="checkbox" name="CRUD[]" value="U" id="U"
                                            @if ($isCRUD[1])
                                            checked
                                            @endif>
                                            <label for="U">Update</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <input type="checkbox" name="CRUD[]" value="D" id="D"
                                            @if ($isCRUD[0])
                                            checked
                                            @endif>
                                            <label for="D">Delete</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div style="margin-bottom: 2vh; display:flex; justify-content:center;">
                            <button type="submit" class="btn btn-success mt-auto" style="width:15vw;">Update Permission</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
