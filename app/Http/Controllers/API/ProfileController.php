<?php

namespace App\Http\Controllers\API;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileRessource;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProfileRessource::collection(Profile::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all();
        $formFields['password'] = Hash::make($request->password);
        $profile = Profile::create($formFields);

        return new ProfileRessource($profile);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return new ProfileRessource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $formFields = $request->all();

        $formFields['password'] = Hash::make($request->password);

        $profile->fill($formFields)->save();

        return new ProfileRessource($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json([
            'message'=>'Le profile est supprimé.',
            'id'=>$profile->id,
            'errors'=>[]
        ]);
    }
}
