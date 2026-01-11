<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();
        return view('artist.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('create-artist')) {
            abort(403);
        }

        return view('artist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('create-artist')) {
            abort(403);
        }

        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
        ]);

        Artist::create($validated);

        return redirect()->route('artist.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artist.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('update-artist')) {
            abort(403);
        }

        $artist = Artist::findOrFail($id);
        return view('artist.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('update-artist')) {
            abort(403);
        }

        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
        ]);

        $artist = Artist::findOrFail($id);
        $artist->update($validated);

        return redirect()->route('artist.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (!Gate::allows('delete-artist')) {
            abort(403);
        }

        $artist = Artist::findOrFail($id);
        $artist->delete();

        return redirect()->route('artist.index');
    }
}
