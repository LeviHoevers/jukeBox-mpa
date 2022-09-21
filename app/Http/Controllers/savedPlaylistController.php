<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\SavedPlaylist;

use App\Models\SavedPlaylistSong;

class SavedPlaylistController extends Controller
{
    public function show(){

        $savedPlaylists = SavedPlaylist::where("user_id", Auth::user()->id)->get();
 
        return view("savedPlaylists", ["savedPlaylists" => $savedPlaylists]);
    }


    public function savePlaylist(Request $request){
        
        $sessionPlaylist = $request->session()->get("playlist");

        if (Auth::check() && isset($sessionPlaylist)) {

            $saved_playlist = SavedPlaylist::create([
                "user_id" => Auth::user()->id,
                "name" => "playlist"
            ]);

            foreach($sessionPlaylist as $currentSong){
                SavedPLaylistSong::create([
                    "saved_playlist_id" => $saved_playlist->id,
                    "song_id" => $currentSong->id
                ]);
            }

            $request->session()->forget("playlist");

            return redirect()->back();
        }
    }

    public function deletePlaylist($playlist_id){

        SavedPlaylist::where("id", $playlist_id)->delete();

        return redirect()->back();
    }

    public function changeNamePlaylist(Request $request, $playlist_id){

        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();

        if(isset($request->input)){
            
            $selectedPlaylist->name = $request->input;

            $selectedPlaylist->save();    
        }

        return redirect()->back();
    }

    public function showChangeNamePlaylist($playlist_id){
        
        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();

        return view("changeNamePlaylist", ["selectedPlaylist" => $selectedPlaylist]);
    }

    public function addToSavedPlaylist(Request $request, $song_id){

        SavedPlaylistSong::create([
            "saved_playlist_id" => $request->selectedPlaylist,
            "song_id" => $song_id
        ]);

        return redirect()->back();
    }
}
