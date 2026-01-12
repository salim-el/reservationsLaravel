<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Price::all();

        return view('price.index', [
            'prices' => $prices,
        ]);
    }

    public function show($id)
    {
        $price = Price::findOrFail($id);

        return view('price.show', [
            'price' => $
