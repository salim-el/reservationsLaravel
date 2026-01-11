<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        $resource = 'artistes';

        return view('artist.index', [
            'artists' => $artists,
            'resource' => $resource,
        ]);
    }

    public function show($id)
    {
        $artist = Artist::find($id);

        return view('artist.show', [
            'artist' => $artist,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname'  => 'required|max:60',
        ]);

        // Création d’un nouvel artiste
        $artist = new Artist();
        $artist->firstname = $validated['firstname'];
        $artist->lastname  = $validated['lastname'];

        // Sauvegarde en base de données
        $artist->save();

        // Redirection vers l’index
        return redirect()->route('artist.index');
    }

    public function edit($id)
    {
        $artist = Artist::find($id);

        return view('artist.edit', [
            'artist' => $artist,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname'  => 'required|max:60',
        ]);

        $artist = Artist::find($id);
        $artist->firstname = $validated['firstname'];
        $artist->lastname  = $validated['lastname'];
        $artist->save();

        return view('artist.show', [
            'artist' => $artist,
        ]);
    }
}
