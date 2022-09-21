<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

class SongController extends Controller
{
    //laat alle nummers van 1 genre zien
    public function show($genre_id){
        return view("songs", ["tableSong"=>Song::where("genre_id", $genre_id)->get(), "currentGenre"=>$genre_id]);
    }
}
