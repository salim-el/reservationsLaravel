<?php

namespace App\Http\Controllers;

use App\Models\Locality;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localities = Locality::all();

        return view('locality.index', compact('localities'));
    }

    /**
     * Display the specified resource.
     * Affiche une localité et tous les lieux qui s’y trouvent
     */
    public function show(int $id)
    {
        $locality = Locality::with('locations')->findOrFail($id);

        return view('locality.show', compact('locality'));
    }
}
