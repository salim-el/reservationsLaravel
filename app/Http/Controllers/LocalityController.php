<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localities = Locality::all();

        return view('locality.index', [
            'localities' => $localities,
        ]);
    }

    /**
     * Display the specified resource.
     * Affiche une localité et tous les lieux qui s’y trouvent
     */
    public function show(int $postal_code)
    {
        $locality = Locality::where('postal_code', $postal_code)
            ->with('locations')
            ->firstOrFail();

        return view('locality.show', [
            'locality' => $locality,
        ]);
    }
}
