<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Providers\RouteServiceProvider;

/**
 * processing authentications
 */
class SigninController extends Controller
{
    public function __construct(){
        $this->middleware('guest:user')->except('logout');
    }
    private const SUPERADMIN = 1;
    private const ADMIN = 2;
    private const MERCHANT = 3;

    // public function superAdminLogin(Request $request){
    //     $credentials =  $request->validate([
    //                         'email' => ['required', 'email'],
    //                         'password' => ['required'],
    //                     ]);
    //     $credentials['role_id'] = 1;
    //     if(Auth::guard('user')->attempt($credentials)){ //if user is 'super admin'
    //         $request->session()->regenerate();//update session
    //         return redirect(RouteServiceProvider::SUPER_ADMIN_HOME);
    //     }
    //     return back()->withErrors([
    //         'error' => 'Can not log in. Email or Password or Both are wrong as Super Admin.'
    //     ]);
    // }
    //

    public function aboveAdminSignin(Request $request){
        $credentials =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //trying logging in
        if(Auth::guard('user')->attempt($credentials)) {
            $role = $request->user('user')->role_id;
            switch ($role) {
                case self::SUPERADMIN :
                    $request->session()->regenerate(); //update session
                    return redirect()->intended('/aboveAdmin/home');
                    break;
                case self::ADMIN :
                    $request->session()->regenerate(); //update session
                    return redirect()->intended('/aboveAdmin/home');
                    break;
                default:
                    Auth::guard('user')->logout();
                    $request->session()->regenerate();
                    return back()->witheErrors([
                    'error' => 'You do not have permission to log in as Admin or Super Admin.',
                ]);
                    break;
            }
        }
        //when can not log in
        return back()->withErrors([
            'error' => 'Can not log in. Email, Password or Both are wrong.'
        ]);
    }

    public function merchantSignin(Request $request){
        $credentials =  $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials['role_id'] = self::MERCHANT;

         //trying logging in as merchant
        if(Auth::guard('user')->attempt($credentials)){
            $request->session()->regenerate(); //update session
            return redirect()->intended('/merchant/home');
        }
        //when can not log in
        return back()->withErrors([
            'error' => 'Can not log in. Email, Password or Both are wrong.'
        ]);
    }
}
