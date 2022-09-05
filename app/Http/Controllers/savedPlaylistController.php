<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\SavedPLaylist;

use App\Models\SavedPLaylistSong;

class SavedPlaylistController extends Controller
{
    public function show(){

        $savedPlaylists = SavedPLaylist::where("user_id", Auth::user()->id)->get();
 
        return view("savedPlaylists", ["savedPlaylists" => $savedPlaylists]);
    }


    public function savePlaylist(Request $request){
        
        $sessionPlaylist = $request->session()->get("playlist");

        if (Auth::check() && isset($sessionPlaylist)) {

            $saved_playlist = SavedPLaylist::create([
                "user_id" => Auth::user()->id,
                "name" => "playlist"
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

    public function deletePlaylist($playlist_id){

        SavedPlaylist::where("id", $playlist_id)->delete();

        return redirect()->back();
    }

    public function changeNamePlaylist(Request $request, $playlist_id){

        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();

        $selectedPlaylist->name = $request->input;

        $selectedPlaylist->save();

        return redirect()->back();
    }

    public function showChangeNamePlaylist($playlist_id){

        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();

        return view("changeNamePlaylist", ["selectedPlaylist" => $selectedPlaylist]);
    }
}
