<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SavedPlaylist;

use App\Models\SavedPlaylistSong;

class SavedPlaylistDetailsController extends Controller
{
    public function show($saved_playlist_id){
        return view('savedPlaylistDetails', ['allSongs' => SavedPlaylist::find($saved_playlist_id)->songs]);
    }

    public function deleteSavedSong($song_id, $saved_playlist_id){

        SavedPlaylistSong::where("song_id", $song_id)->limit(1);

        return redirect()->back();
    }

    public function addToSavedPlaylist(Request $request, $song_id){

        dd($request->selectedPlaylist);
    }
}
