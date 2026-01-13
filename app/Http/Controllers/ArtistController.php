<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('artist.index', compact('artists'));
    }

    public function create()
    {
        if (!Gate::allows('create-artist')) {
            abort(403);
        }

        return view('artist.create');
    }

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

    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return view('artist.show', compact('artist'));
    }

    public function edit($id)
    {
        if (!Gate::allows('update-artist')) {
            abort(403);
        }

        $artist = Artist::findOrFail($id);
        return view('artist.edit', compact('artist'));
    }

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
