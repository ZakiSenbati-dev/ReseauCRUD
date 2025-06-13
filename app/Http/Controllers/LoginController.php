<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            //connecter
            $request->session()->regenerate();
            return to_route('homepage')->with('success', 'Vous êtes connecté '.$login.".");
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
