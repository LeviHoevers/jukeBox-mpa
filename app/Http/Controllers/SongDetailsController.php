<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\SavedPlaylist;

use App\Models\User;

use App\Models\Song;

class SongDetailsController extends Controller
{
    public function show($saved_playlist_id){
        return view('savedPlaylistDetails', ['allSongs' => SavedPlaylist::find($saved_playlist_id)->songs, 'saved_playlist_id' => $saved_playlist_id]);
    }

    public function deleteSavedSong($song_id, $saved_playlist_id){

        SavedPlaylistSong::where("saved_playlist_id", $saved_playlist_id)->where("song_id", $song_id)->limit(1)->delete();

        return redirect()->back();
    }
}
