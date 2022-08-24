<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

class SongController extends Controller
{
    public function show($genre_id){
        $tableSong = Song::where("genre_id", $genre_id)->get();
        return view("songs", ["tableSong"=>$tableSong, "currentGenre"=>$genre_id]);
    }
}
