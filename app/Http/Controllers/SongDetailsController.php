<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\SavedPlaylist;

use App\Models\User;

use App\Models\Song;

class SongDetailsController extends Controller
{
    public function show($song_id){

        if(Auth::check()){
            $user_playlists = SavedPlaylist::where("user_id", Auth::user()->id)->get();
        }
        else{
            $user_playlists = null;
        }
        
        return view('songDetails', ["currentSong" => Song::find($song_id), "user_playlists" => $user_playlists]);
    }

    public function deleteSavedSong($song_id, $saved_playlist_id){

        SavedPlaylistSong::where("saved_playlist_id", $saved_playlist_id)->where("song_id", $song_id)->limit(1)->delete();

        return redirect()->back();
    }

}
