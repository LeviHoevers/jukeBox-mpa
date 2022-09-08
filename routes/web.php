<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GenreController;

use App\Http\Controllers\SongController;

use App\Http\Controllers\SongDetailsController;

use App\Http\Controllers\PlaylistController;

use App\Http\Controllers\SavedPlaylistController;

use App\Http\Controllers\SavedPlaylistDetailsController;

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

Route::get('/savePlaylist', [SavedPlaylistController::class, "savePlaylist"]);

Route::get('/savedPlaylists', [SavedPlaylistController::class, "show"]);

Route::get('/changeNamePlaylist/{playlist_id}', [SavedPlaylistController::class, "showChangeNamePlaylist"]);

Route::get('/deletePlaylist/{playlist_id}', [SavedPlaylistController::class, "deletePlaylist"]);

Route::post('/changePlaylist/{playlist_id}', [SavedPlaylistController::class, "changeNamePlaylist"]);

Route::get('/savedPlaylistDetails/{saved_playlist_id}', [SavedPlaylistDetailsController::class, "show"]);

Route::get('/deleteSavedSong/{song_id}', [SavedPlaylistDetailsController::class, "deleteSavedSong"]);

