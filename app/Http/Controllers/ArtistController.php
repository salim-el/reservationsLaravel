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
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $artist = Artist::find($id);

        return view('artist.edit', [
            'artist' => $artist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname'  => 'required|max:60',
        ]);

        // Le formulaire a été validé, nous récupérons l’artiste à modifier
        $artist = Artist::find($id);

        // Mise à jour des données modifiées et sauvegarde dans la base de données
        $artist->update($validated);

        // Comme dans le support : on renvoie la vue show
        return view('artist.show', [
            'artist' => $artist,
        ]);
    }
}
