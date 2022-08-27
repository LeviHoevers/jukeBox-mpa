<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

class SessionController extends Controller
{
    public function getSong(Request $request, $song_id){
        $selectedSong = Song::where('id', $song_id)->first();

        if(!$request->session()->has("playlist")){
            $playlist = [];
            $request->session()->put('playlist', $playlist);
        }
        $sessionPlaylist = $request->session()->get('playlist');
        array_push($sessionPlaylist, $selectedSong);
        $request->session()->put('playlist', $sessionPlaylist);
        dd($request->session());
    }
}
