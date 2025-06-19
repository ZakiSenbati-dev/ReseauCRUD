<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Mail\profileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Cache;

class ProfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        //cache
        $page = request('page', 1); // Get the current page from the query string

        $profiles = Cache::remember("profiles_page_$page", 10, function () {
            return Profile::paginate(9);
        });


        return view('profile.index', compact('profiles'));
    }

    public function show(String $id)
    {
        //cache

        $profile = Cache::remember('profile_'.$id, 10, function() use ($id) {
            return Profile::findOrFail($id);
        });

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
        $profile = Profile::create($formFields);

        Mail::to('zakisenbati22@gmail.com')->send(new profileMail($profile));


        //Redirections
        return redirect()->route("profiles.index")->with('success', 'Votre compte a été créé avec succès.');

    }

    public function verifyEmail(string $hash){

        [$createdAt,$id] = explode('///',base64_decode($hash)) ;
        $profile = Profile::findOrFail($id);

        if($profile->created_at->toDateTimeString() !== $createdAt){
            abort(403);
        }

        if($profile->email_verified_at !== NULL){
            return response('Compte déja activé');
        }

        $name = $profile->name;
        $email = $profile->email;
        $profile->fill([
            'email_verified_at' => time()
        ])->save();

        return view('profile.email_verified', compact('name', 'email'));
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
