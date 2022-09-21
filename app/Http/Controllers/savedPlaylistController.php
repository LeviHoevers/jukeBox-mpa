<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\SavedPlaylist;

use App\Models\SavedPlaylistSong;

class SavedPlaylistController extends Controller
{
    //laat de view zien van de opgeslagen playlist en geeft de opgeslagen playlist zelf mee
    public function show(){

        $savedPlaylists = SavedPlaylist::where("user_id", Auth::user()->id)->get();
 
        return view("savedPlaylists", ["savedPlaylists" => $savedPlaylists]);
    }


    //verwijder playlist uit de database
    public function deletePlaylist($playlist_id){

        SavedPlaylist::where("id", $playlist_id)->delete();

        return redirect()->back();
    }

    //veranderd naam van de opgeslagen playlist
    public function changeNamePlaylist(Request $request, $playlist_id){

        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();

        if(isset($request->input)){
            
            $selectedPlaylist->name = $request->input;

            $selectedPlaylist->save();    
        }

        return redirect()->back();
    }

    //laat de pagina zien waart je de naam van de playlist kan aanpassen
    public function showChangeNamePlaylist($playlist_id){
        
        $selectedPlaylist = SavedPlaylist::where("id", $playlist_id)->first();

        return view("changeNamePlaylist", ["selectedPlaylist" => $selectedPlaylist]);
    }

    //voegt een song toe aan een bestaande playlist
    public function addToSavedPlaylist(Request $request, $song_id){

        SavedPlaylistSong::create([
            "saved_playlist_id" => $request->selectedPlaylist,
            "song_id" => $song_id
        ]);

        return redirect()->back();
    }
}
