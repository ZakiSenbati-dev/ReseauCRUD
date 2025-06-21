<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Mail\profileMail;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    public function index(Request $request){

        // Compteur de visites (tu l’avais déjà)
        $compteur = $request->session()->increment('compteur');

        // Nouvelles données pour le tableau de bord
        $profilesCount      = Profile::count();
        $publicationsCount  = Publication::count();
        $latestProfiles     = Profile::latest()->take(5)->get();
        $latestPublications = Publication::latest()->take(5)->get();

        return view('home', compact(
            'compteur',
            'profilesCount',
            'publicationsCount',
            'latestProfiles',
            'latestPublications'
        ));
    }

}


