<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class SavedPlaylistController extends Controller
{
    public function savePlaylist(Request $request){
        
        $sessionPlaylist = $request->session()->get("playlist");

        if (Auth::check() && isset($sessionPlaylist)) {
            
            $name = "cheese";

            DB::insert("insert into saved_playlists (user_id, name) values (?, ?)", [Auth::user()->id, $name]);

            foreach($sessionPlaylist as $currentSong){
                DB::insert("insert into saved_playlist_songs (saved_playlist_id, song_id) values (?, ?)", [$saved_playlist_id, $currentSong->id]);
            }

            return redirect()->back();
        }
    }
}
