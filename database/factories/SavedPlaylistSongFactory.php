<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

use App\Model\Song;

class SavedPlaylistSongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'saved_playlist_id' => ,
            'song_id' => Song::all()->random()->id,
        ];
    }
}
