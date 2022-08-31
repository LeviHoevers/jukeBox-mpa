<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class songs_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Song::factory(50)->create();
    }
}
