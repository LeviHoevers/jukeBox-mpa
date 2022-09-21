<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Genre;

class GenreController extends Controller
{
    //laat de view zien van genres en geeft de volledige genre tabel mee
    public function show(){
        return view("genres", ["tableGenre"=>Genre::all()]);
    }
}
