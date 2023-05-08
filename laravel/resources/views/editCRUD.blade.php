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
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <form method="POST" action="{{route('post.editPermission')}}">
                    @csrf
                    <div class="col-md-6">
                        <div class="small mb-1">User Id:{{$user->id}}</div>
                        <div class="small mb-1">User Name:{{$user->first_name}} {{$user->last_name}}</div>
                        <div class="small mb-1">Role:{{$user->role_id}}</div>
                        <div class="small mb-1">Permission:
                        <div>
                            <input type="checkbox" name="CRUD[]" value="C" id="C"
                            @if ($isCRUD[3])
                            checked
                            @endif>
                            <label for="C">Create</label>
                        </div>
                        <div>
                            <input type="checkbox" name="CRUD[]" value="R" id="R" checked disabled>
                            <label for="R">Read</label>
                        </div>
                        <div>
                            <input type="checkbox" name="CRUD[]" value="U" id="U"
                            @if ($isCRUD[1])
                            checked
                            @endif>
                            <label for="U">Update</label>
                        </div>
                        <div>
                            <input type="checkbox" name="CRUD[]" value="D" id="D"
                            @if ($isCRUD[0])
                            checked
                            @endif>
                            <label for="D">Delete</label>
                        </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button type="submit" class="btn btn-outline-none mt-auto">Update Permission</button>
                </form>
            </div>
        </div>
    </section>
@endsection
