<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GenreController;

use App\Http\Controllers\SongController;

use App\http\Controllers\SongDetailsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/genres', [GenreController::class,"show"]);

Route::get('/songs/{genre_id}', [SongController::class, "show"]);

Route::get('/songDetails/{song_id}', [SongDetailsController::class, "show"]);


