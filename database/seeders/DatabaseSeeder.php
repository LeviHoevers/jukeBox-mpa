<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GenreSeeder::class,
            songs_seeder::class,
            UserSeeder::class,
            SavedPlaylistSeeder::class,
            SavedPlayListSongSeeder::class
        ]);
    }
}
