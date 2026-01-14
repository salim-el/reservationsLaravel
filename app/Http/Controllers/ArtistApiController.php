<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistApiController extends Controller
{
    public function index()
    {
        return response()->json(Artist::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:60'],
            'lastname'  => ['required', 'string', 'max:60'],
        ]);

        $artist = Artist::create($validated);

        return response()->json($artist, 201);
    }

    public function show(Artist $artist)
    {
        return response()->json($artist, 200);
    }

    public function update(Request $request, Artist $artist)
    {
        $validated = $request->validate([
            'firstname' => ['sometimes', 'string', 'max:60'],
            'lastname'  => ['sometimes', 'string', 'max:60'],
        ]);

        $artist->update($validated);

        return response()->json($artist, 200);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();

        return response()->json(['message' => 'Artist deleted'], 200);
    }
}
