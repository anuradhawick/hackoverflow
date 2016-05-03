<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Check if the email is occupied or free to be registered with
     *
     * @param Request $request
     * @return mixed
     */
    public function checkAvailable(Request $request)
    {
        if ($user = User::where('email', $request->input('regEmail'))->first()) {
            return json_encode(false);
        } else {
            return json_encode(true);
        }
    }


    /**
     * Create new user and login that user, then redirect to the intended url
     * @param Request $request
     * @return mixed
     */
    public function registerUser(Request $request)
    {
        // Retrieve the data from the HTTP request
        $fname = $request->input('fname');
        $mname = $request->input('mname');
        $lname = $request->input('lname');
        $organization = $request->input('company');
        $tel = $request->input('tel');
        $email = $request->input('regEmail');
        $password = $request->input('password');

        // Create the user and set the attributes
        $user = new User();
        $user->fname = $fname;
        $user->mname = $mname;
        $user->lname = $lname;
        $user->organization = $organization;
        $user->tel = $tel;
        $user->email = $email;
        $user->password = bcrypt($password);

        // Save the user
        $user->save();

        // Try to Authenticate the user and redirect to the intended or the root url
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Auth::login(Auth::user());
            return redirect()->intended('/');
        } else {
            // On failure redirect to the login page
            $request->session()->put('error', 'Critical error, please contact the admin. Thank you!');
            return redirect('/login');
        }
    }
}
