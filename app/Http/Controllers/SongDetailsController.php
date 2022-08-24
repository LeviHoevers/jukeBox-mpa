<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

class SongDetailsController extends Controller
{
    public function show($song_id){
        $currentSong = Song::where('id', $song_id)->first();
        return view("songDetails", ["currentSong"=>$currentSong]);
    }
}
