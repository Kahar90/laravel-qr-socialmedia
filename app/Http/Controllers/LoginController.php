<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;
class LoginController extends Controller
{
    public function github()
    {

        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $user_github = Socialite::driver('github')->stateless()->user();

        // add to database, if not exists
        $user = DB::table('users_qr-app')->where('email', $user_github->email)->first();
        if (!$user) {
            $user = DB::table('users_qr-app')->insert([
                'email' => $user_github->email,
                'password' => $user_github->token,
            ]);
        }


        return view('qr-code', compact('user'));
    }


    public function qrCodeLogin()
    {
        // if token exists in database, login
        $user = DB::table('users_qr-app')->where('password', request('content'))->first();
        if ($user) {

            return view('qr-code', compact('user'));
        } else {
            return view('login');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
