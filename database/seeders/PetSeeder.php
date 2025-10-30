<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetSeeder extends Seeder
{
    public function run()
    {
        // create 20 pets
        Pet::factory()->count(30)->create();
    }
}
