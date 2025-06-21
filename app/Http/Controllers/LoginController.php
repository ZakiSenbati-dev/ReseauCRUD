<?php

namespace App\Http\Controllers;

use App\Mail\profileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('login.show');
    }

    public function login(Request $request){

        $login = $request->login;
        $password = $request->password;
        $credentials = ['email' => $login, "password" => $password];

        if(Auth::attempt($credentials)){

            $profile = Auth::user();
            //connecter

            if(($profile->hasVerifiedEmail())){
                $request->session()->regenerate(true);
                return to_route('homepage')->with('success', 'Vous êtes connecté '.$login.".");
            }else{
                $request->session()->invalidate();
                $profile = Auth::user();
                Mail::to($profile->email)->send(new profileMail($profile));
                return back()->withErrors([
                    'login'=>'Merci de verifier votre Email pour activer votre compte '.$profile->email,
                ])->onlyInput('login');
            }

        }
        else{
            //something else
            return back()->withErrors([
                'login'=>'Email ou mot de passe incorrectes.',
            ])->onlyInput('login');
        };
    }

    public function logout(){

        Auth::logout();

        Session::flush();

        return to_route('login')->with('success', 'Vous êtes déconnecté');
    }
}
