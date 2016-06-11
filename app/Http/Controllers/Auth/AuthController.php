<?php

namespace App\Http\Controllers\Auth;

use App\Jobs\SendThankYouMail;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=" . $req->input('token'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $data = json_decode($output, true);
        curl_close($ch);
        if ($this->validateData($data)) {
            if (Auth::attempt(['sub' => $data['sub'], 'password' => $data['aud']])) {
                // Generate the session for the logged in user
                Auth::login(Auth::user());
                // Return the user to the intended link or the root
                return "logged" . Auth::user()->name . Auth::check();
            } else {
//                 Create new user and Authenticate
                DB::table('users')->insert([
                    'given_name' => $data['given_name'],
                    'family_name' => $data['family_name'],
                    'name' => $data['name'],
                    'sub' => $data['sub'],
                    'password' => bcrypt($data['aud']),
                    'picture' => $data['picture'],
                    'email' => $data['email'],
                ]);
                if (Auth::attempt(['sub' => $data['sub'], 'password' => $data['aud']])) {
                    // Generate the session for the logged in user
                    Auth::login(Auth::user());
                    // Return the user to the intended link or the root
                    $job = (new SendThankYouMail(Auth::user()));
                    dispatch($job);
                    return "Acc created";
                } else {
                    return "error";
                }
            }
        } else {
            return "error";
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
        return "success";
    }

    /**
     * @param $data
     * @return bool
     */
    private function validateData($data)
    {
        if ($data['aud'] != "732115526464-it7hknll4or0fmhore01ud96ufkd9u2d.apps.googleusercontent.com") {
            return false;
        }
        if ($data['iat'] > $data['exp']) {
            return false;
        }
        if ($data['email_verified'] != true) {
            return false;
        }
        return true;
    }
}
