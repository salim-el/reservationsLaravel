<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::orderBy('lastname')->orderBy('firstname')->get();
        return view('artist.index', compact('artists'));
    }

    public function create()
    {
        return view('artist.create');
    }

    public function store(Request $request)
    {
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
        $artist = Artist::findOrFail($id);
        return view('artist.edit', compact('artist'));
    }

    public function update(Request $request, $id)
    {
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
        $artist = Artist::find($id);

        if ($artist) {
            $artist->delete();
        }

        return redirect()->route('artist.index');
    }
}
