<?php

namespace App\Models;

use App\Models\Song;

use Illuminate\Http\Request;

class Playlist
{
    public function addSong(Request $request, $song_id){
        
        $selectedSong = Song::where('id', $song_id)->first();

        if(!$request->session()->has("playlist")){
            $playlist = [];
            $request->session()->put('playlist', $playlist);
        }
        $sessionPlaylist = $request->session()->get('playlist');
        array_push($sessionPlaylist, $selectedSong);
        $request->session()->put('playlist', $sessionPlaylist);

        return redirect()->back();
    }

    Public function deleteSong(Request $request, $song_id){
        
        $selectedSong = $request->session()->get("id", $song_id);

        return redirect()->back();
    }
}