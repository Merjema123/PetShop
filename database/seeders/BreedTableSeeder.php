<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Breed;

class BreedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Breed::factory()->count(5)->create();
    }
}
