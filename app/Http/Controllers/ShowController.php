<?php

namespace App\Http\Controllers;

use App\Models\Show;

class ShowController extends Controller
{
    public function index()
    {
        $shows = Show::all();
        return view('show.index', compact('shows'));
    }

    public function show(string $id)
    {
        $show = Show::find($id);

        // Récupérer les artistes du spectacle et les grouper par type
        $collaborateurs = [];

        foreach ($show->artistTypes as $at) {
            $collaborateurs[$at->type->type][] = $at->artist;
        }

        return view('show.show', [
            'show' => $show,
            'collaborateurs' => $collaborateurs,
        ]);
    }
}
