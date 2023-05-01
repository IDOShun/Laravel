<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function createUser(Request $request){
        //引数を追加して、ifでroleのところとかを変える
        $user = new User();
        $user->create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'CRUD' => 3,
            'role_id' => 2
        ]);
        return redirect('admin/home');
    }
}
