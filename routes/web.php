<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GenreController;

use App\Http\Controllers\SongController;

use App\Http\Controllers\SongDetailsController;

use App\Http\Controllers\PlaylistController;

use App\Http\Controllers\SavedPlaylistController;

use App\Http\Controllers\SavedPlaylistDetailsController;

use App\Http\Controllers\SessionController;

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

Route::get('/addSong/{song_id}', [SessionController::class, "addSong"]);

Route::get('/playlist', [SessionController::class, "show"]);

Route::get('/deleteSong/{song_index}', [SessionController::class, "deleteSong"]);

Route::get('/savePlaylist', [SessionController::class, "savePlaylist"]);

Route::get('/savedPlaylists', [SavedPlaylistController::class, "show"])->middleware('auth');

Route::get('/changeNamePlaylist/{playlist_id}', [SavedPlaylistController::class, "showChangeNamePlaylist"])->middleware('auth');

Route::get('/deletePlaylist/{playlist_id}', [SavedPlaylistController::class, "deletePlaylist"])->middleware('auth');

Route::post('/changePlaylist/{playlist_id}', [SavedPlaylistController::class, "changeNamePlaylist"])->middleware('auth');

Route::get('/savedPlaylistDetails/{saved_playlist_id}', [SavedPlaylistDetailsController::class, "show"])->middleware('auth');

Route::get('/deleteSavedSong/{song_id}/{saved_playlist_id}', [SavedPlaylistDetailsController::class, "deleteSavedSong"])->middleware('auth');

Route::post('/addToSavedPlaylist/{song_id}', [SavedPlaylistController::class, "addToSavedPlaylist"])->middleware('auth');

