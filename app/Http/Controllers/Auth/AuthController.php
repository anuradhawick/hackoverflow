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

    /**
     * Authenticate the user and start the logged in session
     * 
     * @param Request $req
     * @return mixed
     */
    public function authenticate(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Generate the session for the logged in user
            Auth::login(Auth::user());
            // Return the user to the intended link or the root
            return redirect()->intended('/');
        } else {
            // Pass the error message to the front end
            return redirect('/login')->with('error', 'Email address or password is/are invalid. Try again!');
        }
    }

    /**
     * Logging out from the active session
     * 
     * @return mixed
     */
    public function logout()
    {
        // Terminate the session and redirect the user
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/');
    }
}
