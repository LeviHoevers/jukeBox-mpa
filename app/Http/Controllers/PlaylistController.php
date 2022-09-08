<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

use App\Models\SavedPlaylist;

use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function show(Request $request){

        $playlist = $request->session()->get('playlist');
        
        $totalDuration = PlaylistController::calcDuration($playlist);
        
        return view("playlist", ['playlist' => $playlist, 'totalDuration' => $totalDuration]);
    }

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

    public function calcDuration($playlist){

        $totalDuration = "00:00:00";

        if(isset($playlist)){
            foreach($playlist as $currentSong){
                $totalDuration = date('H:i:s', strtotime($totalDuration) + strtotime($currentSong->duration));
            }
            return $totalDuration;
        }
    }
}
