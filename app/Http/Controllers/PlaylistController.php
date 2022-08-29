<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function show(Request $request){
        $playlist = $request->session()->get("playlist");
        return view("playlist", ['playlist' => $playlist]);
    }
}
