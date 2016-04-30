<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    public function authenticate(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
//        return Auth::user();
//        if (Auth::attempt(['email' => $email, 'password' => $password])) {
//            // Authentication passed...
//            Auth::login(Auth::user());
//            return redirect()->intended('/test');
////            echo $user->name;
////            return Auth::user();
//        }else{
//            $req->session()->put('error', 'Email address or password is/are invalid. Try again!');
//            return redirect('/login')->with('error', 'Email address or password is/are invalid. Try again!');
//        }
    }
}
