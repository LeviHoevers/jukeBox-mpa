<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

use App\Models\SavedPlaylist;

class PlaylistController extends Controller
{
    //laat de view zien die bij de playlist hoort en haalt de playlist op in de sessie
    public function show(Request $request){

        $playlist = SessionController::getPlaylist($request);

        $totalDuration = PlaylistController::calcDuration($playlist);
            
        return view("playlist", ['playlist' => $playlist, 'totalDuration' => $totalDuration]);
    }

    //berekend de tijd door over alle nummers in de playlist te loopen
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
