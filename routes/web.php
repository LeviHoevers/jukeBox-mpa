<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GenreController;

use App\Http\Controllers\SongController;

use App\Http\Controllers\SongDetailsController;

use App\Http\Controllers\SessionController;

use App\Http\Controllers\PlaylistController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/genres', [GenreController::class,"show"]);

Route::get('/songs/{genre_id}', [SongController::class, "show"]);

Route::get('/songDetails/{song_id}', [SongDetailsController::class, "show"]);

Route::get('/addSong/{song_id}', [PlaylistController::class, "addSong"]);

Route::get('/playlist', [PlaylistController::class, "show"]);

Route::get('/deleteSong/{song_index}', [PlaylistController::class, "deleteSong"]);
