<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

class SongDetailsController extends Controller
{
    public function show($song_id){
        return view("songDetails", ["currentSong"=>Song::where('id', $song_id)->first()]);
    }
}
