<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function index(Request $request){
        return view('settings');
    }
}
