<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function createUserAdmin(Request $request){
        //for Admin
        $user = new User();
        $user->create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'CRUD' => 3, //read only
            'role_id' => 2 //admin
        ]);
        return redirect('/aboveAdmin/signin');
    }

    public function createUserMerchant(Request $request){
        //for Admin
        $user = new User();
        $user->create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'CRUD' => 3, //read only
            'role_id' => 3 //merchant
        ]);
        return redirect('/merchant/signin');
    }
}
