<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    public function index()
    {
        $localities = Locality::all();

        return view('locality.index', [
            'localities' => $localities,
        ]);
    }

    public function show($postal_code)
    {
        $locality = Locality::where('postal_code', $postal_code)->firstOrFail();

        return view('locality.show', [
            'locality' => $locality,
        ]);
    }
}
