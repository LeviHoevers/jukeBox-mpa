<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavedPlaylistDetailsController extends Controller
{
    public function show(){
        return view('/savedPlaylistDetails');
    }
}
