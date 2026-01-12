<?php

namespace App\Http\Controllers;

use App\Models\Price;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();

        return view('price.index', [
            'prices' => $prices,
            'resource' => 'prices',
        ]);
    }

    public function show(string $id)
    {
        $price = Price::findOrFail($id);

        return view('price.show', [
            'price' => $price,
        ]);
    }

    public function create() {}
    public function store(\Illuminate\Http\Request $request) {}
    public function edit(string $id) {}
    public function update(\Illuminate\Http\Request $request, string $id) {}
    public function destroy(string $id) {}
}
