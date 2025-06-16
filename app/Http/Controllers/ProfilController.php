<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //dd(Profile::all());
        //$profiles = Profile::all();
        $profiles = Profile::paginate(9);
        return view('profile.index', compact('profiles'));
    }

    public function show(Profile $profile){
        //$id = (int)$request -> id;
        //$profile =Profile::findOrFail($id);
        //dd($profile);

        return view('profile.show',compact('profile') );
    }

    public function create(){
        return view('profile.create');
    }

    public function store(ProfileRequest $request){

        //validation
         $formFields = $request->validated();

        //Hash/Cryptage
        $formFields['password'] = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('profile', 'public');
        }else {
            $formFields['image'] = 'profile/Profile-img.png'; // Set your default here
        }
        //insertion
        Profile::create($formFields);



        //Redirections
        return redirect()->route("profiles.index")->with('success', 'Votre compte a été créé avec succès.');

    }

    /*it delete but it goes the page 1 always.
    public function destroy(Profile $profile)
    {

        $profile->delete();

        return to_route('profiles.index')->with('success', 'Le profile à bien supprimé') ;
    }*/

    public function destroy(Request $request, Profile $profile)
    {
        $profile->delete();

        // Récupérer la page actuelle ou 1 si non définie
        $page = $request->input('page', 1);

        return redirect()->route('profiles.index', ['page' => $page])
        ->with('success', 'Le profil a été supprimé');
    }

    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $formFields = $request->validated();
        //Hash/Cryptage
        $formFields['password'] = Hash::make($request->password);

        //we don't need to enter the image every time we modified.
        if ($request->hasFile('image')) {
             $formFields['image'] = $request->file('image')->store('profile', 'public');
        }


        $profile->fill($formFields)->save();

        return to_route("profiles.show", $profile->id)->with('success', 'Le compte a été modifié avec succès.');

    }


}
