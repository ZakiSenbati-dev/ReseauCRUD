<?php

namespace App\Http\Controllers\API;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileRessource;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    private const CACHE_KEY = 'profiles_api';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Cache::delete('self::CACHE_KEY');
        $profiles = Cache::remember(self::CACHE_KEY, 14400, function(){

            return ProfileRessource::collection(Profile::all()) ;
        });

        return $profiles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all();
        $formFields['password'] = Hash::make($request->password);
        $profile = Profile::create($formFields);
        Cache::forget('self::CACHE_KEY');

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

        Cache::forget('self::CACHE_KEY');


        return new ProfileRessource($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        Cache::forget('self::CACHE_KEY');

        return response()->json([
            'message'=>'Le profile est supprimé.',
            'id'=>$profile->id,
            'errors'=>[]
        ]);
    }
}
