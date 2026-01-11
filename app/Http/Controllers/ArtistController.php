<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist; 

class ArtistController extends Controller
{
    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);

        if ($artist) {
            $artist->delete();
        }

        return redirect()->route('artist.index');
    }
}
