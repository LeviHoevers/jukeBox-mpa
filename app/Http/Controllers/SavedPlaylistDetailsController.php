<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SavedPlaylist;

use App\Models\SavedPlaylistSong;

use App\Http\Controllers\PlaylistController;

class SavedPlaylistDetailsController extends Controller
{

    //toont de details van de savedplaylist
    public function show($saved_playlist_id){

        $allSongs = SavedPlaylist::find($saved_playlist_id)->songs;

        $totalDuration = PlaylistController::calcDuration($allSongs);

        return view('savedPlaylistDetails', ['allSongs' => $allSongs, 'saved_playlist_id' => $saved_playlist_id, 'totalDuration' => $totalDuration]);
    }

    //verwijderd opgeslagen nummer in de saved playlist
    public function deleteSavedSong($song_id, $saved_playlist_id){

        SavedPlaylistSong::where("saved_playlist_id", $saved_playlist_id)->where("song_id", $song_id)->limit(1)->delete();

        return redirect()->back();
    }
}
