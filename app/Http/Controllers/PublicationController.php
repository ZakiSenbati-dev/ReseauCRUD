<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PublicationRequest;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        $publications = Publication::latest()->paginate();
        return view('publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
        $formFields = $request->validated();
        $formFields['profile_id']= Auth::id();
        if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('publications', 'public');
        }

        Publication::create($formFields);

        return redirect()->route('publications.index')->with('success', 'Publication créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //Autorisation:
        //Gate (Routes)
        //Policies (Controllers)
        $this->authorize('update', $publication);

        return view('publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(publicationRequest $request, Publication $publication)
    {
        $this->authorize('update', $publication);
        $formFields = $request->validated();
        if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('publications', 'public');
        }

        $publication->fill($formFields)->save();
        return redirect()->route('publications.index')->with('success', 'Publication a été modifié avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return redirect()->route('publications.index')->with('success', 'La publication a été supprimer.');

    }


}
