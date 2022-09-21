<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\SavedPlaylist;

use App\Models\User;

use App\Models\Song;

class SongDetailsController extends Controller
{
    //laat alle data van de song zien en checkt of je ingelogd ben
    public function show($song_id){

        if(Auth::check()){
            $user_playlists = SavedPlaylist::where("user_id", Auth::user()->id)->get();
        }
        else{
            $user_playlists = null;
        }
        
        return view('songDetails', ["currentSong" => Song::find($song_id), "user_playlists" => $user_playlists]);
    }
}
