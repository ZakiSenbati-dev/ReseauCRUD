<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request){
        $users = [
            ['id'=>'1', 'nom'=>'Senbati', 'metier'=>'Technicien informatique'],
            ['id'=>'2', 'nom'=>'Hajoujji', 'metier'=>'Devloppeur web'],
            ['id'=>'3', 'nom'=>'Laghrib', 'metier'=>'Cyber securité'],
        ];
        return view('home', compact('users'));
    }

}


