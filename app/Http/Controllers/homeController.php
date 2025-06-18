<?php

namespace App\Http\Controllers;

use App\Mail\profileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    public function index(Request $request){

        $compteur = $request->session()->increment('compteur');

        Mail::to('zakisenbati22@gmail.com')->send(new profileMail());
        return view('home', compact('compteur'));
    }

}


