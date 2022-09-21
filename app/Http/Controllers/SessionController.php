<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

use App\Models\SavedPlaylist;

use App\Models\SavedPlaylistSong;

use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    //laat de view zien die bij de playlist hoort en haalt de playlist op in de sessie
    public function getPlaylist(Request $request){

        return $request->session()->get('playlist');
    }

    //haalt een song uit de tabel met het id dat ik mee geef om daarna het nummer toe te voegen in de sessie playlist
    public function addSong(Request $request, $song_id){
        
        $selectedSong = Song::where('id', $song_id)->first();

        if(!$request->session()->has("playlist")){
            $playlist = [];
            $request->session()->put('playlist', $playlist);
        }

        $sessionPlaylist = $request->session()->get('playlist');

        array_push($sessionPlaylist, $selectedSong);
        $request->session()->put('playlist', $sessionPlaylist);

        return redirect()->back();
    }

    public function deleteSong(Request $request, $song_index){

        $playlist = $request->session()->get('playlist');

        array_splice($playlist, $song_index, 1);

        $request->session()->put('playlist', $playlist);

        return redirect()->back();  
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

            $request->session()->forget("playlist");

            return redirect()->back();
        }
    }
}
