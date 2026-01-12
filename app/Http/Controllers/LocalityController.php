<?php

namespace App\Http\Controllers;

use App\Models\Locality;

class LocalityController extends Controller
{
    public function index()
    {
        $localities = Locality::all();

        return view('locality.index', [
            'localities' => $localities,
            'resource' => 'localities',
        ]);
    }

    public function show(string $id)
    {
        $locality = Locality::findOrFail($id);

        return view('locality.show', [
            'locality' => $locality,
        ]);
    }

    public function create() {}
    public function store(\Illuminate\Http\Request $request) {}
    public function edit(string $id) {}
    public function update(\Illuminate\Http\Request $request, string $id) {}
    public function destroy(string $id) {}
}
