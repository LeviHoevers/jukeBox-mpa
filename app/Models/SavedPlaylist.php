<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SavedPlaylist;

class SavedPlaylist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];

    public function songs() {
        return $this->belongsToMany(Song::class, 'saved_playlist_songs');
    }
}