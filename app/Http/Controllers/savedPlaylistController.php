<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\SavedPLaylist;

use App\Models\SavedPLaylistSong;

class SavedPlaylistController extends Controller
{
    public function savePlaylist(Request $request){
        
        $sessionPlaylist = $request->session()->get("playlist");

        if (Auth::check() && isset($sessionPlaylist)) {

            $saved_playlist = SavedPLaylist::create([
                "user_id" => Auth::user()->id,
                "name" => "cheese"
            ]);

            foreach($sessionPlaylist as $currentSong){
                SavedPLaylistSong::create([
                    "saved_playlist_id" => $saved_playlist->id,
                    "song_id" => $currentSong->id
                ]);
            }

            return redirect()->back();
        }
    }
}
