<?php

namespace Database\Seeders;

use App\Models\Musician;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Musician::factory(5)->create();
    }
}
