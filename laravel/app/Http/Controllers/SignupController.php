<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function createUserAdmin(Request $request){
        //validation
        $request->validate([
            'first_name' => ['required', 'max:30'],
            'last_name' => ['required', 'max:30'],
            'email' => ['email', 'required', 'max:50'],
            'password' => ['required', 'max:255'],
            'confirm' => ['required', 'max:255'],
        ]);

        //when password confirmation failed
        if(strcmp($request['password'], $request['confirm']) != 0){
            return back()->withErrors([
                'error' => 'password confirmation does not match password',
            ]);
        }

        //For Admin
        $user = new User();
        $user->create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'CRUD' => 3, //read only
            'role_id' => 2 //admin
        ]);
        return redirect()->route('get.aboveAdmin.signin');
    }

    public function createUserMerchant(Request $request){
        //validation
        $request->validate([
            'first_name' => ['required', 'max:30'],
            'last_name' => ['required', 'max:30'],
            'email' => ['email', 'required', 'max:50'],
            'password' => ['required', 'max:255'],
            'confirm' => ['required', 'max:255'],
        ]);

        //when password confirmation failed
        if(strcmp($request['password'], $request['confirm']) != 0){
            return back()->withErrors([
                'error' => 'password confirmation does not match password',
            ]);
        }
        //For Merchant
        $user = new User();
        $user->create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'CRUD' => 3, //read only
            'role_id' => 3 //merchant
        ]);
        return redirect()->route('get.merchant.signin');
    }
}
