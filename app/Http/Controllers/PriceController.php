<?php

namespace App\Http\Controllers;

use App\Models\Price;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();
        return view('price.index', compact('prices'));
    }

    public function show($id)
    {
        $price = Price::findOrFail($id);

        return view('price.show', [
            'price' => $price
        ]);
    }
}
