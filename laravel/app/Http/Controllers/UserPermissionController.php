<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Gate;

class UserPermissionController extends Controller
{
    public function editPermission(Request $request){
        // if($request['CRUD'] == null){return redirect()->route('post.editPermission')->withInput();}
        $CRUD = ['C', 'R', 'U', 'D'];
        $isCRUD = [false, true, false, false];
        $CRUD_nums = [2, 3, 5, 7];
        $CRUD_num = 1;
        if($request['CRUD'] == null){
            $isCRUD[1] = true;
        }else{
            for($i=0; $i<count($request['CRUD']); $i++){
                for($j=0; count($CRUD); $j++){
                    if(strcmp($request['CRUD'][$i], $CRUD[$j]) == 0){
                        $isCRUD[$j] = true;
                        break;
                    }
                }
            }
        }
        //count CRUD num
        for($i=0; $i<count($CRUD); $i++){
            if($isCRUD[$i]){
                $CRUD_num *= $CRUD_nums[$i];
            }
        }
        //update Permission Operation
        $user = User::findOrFail($request['id']);
        $user->CRUD = $CRUD_num;
        $user->save();
        return redirect(route('get.superAdmin.home'));
    }

    public function showUserPermission(Request $request){
        $user = User::findOrFail($request['id']);
        return view('EditCRUD', compact('user'));
    }

    public function deleteUser(Request $request){
        $user = User::findOrFail($request['id']);
        $user->delete();
        return redirect(route('get.superAdmin.home'));
    }
}
