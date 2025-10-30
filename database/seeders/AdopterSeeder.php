<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adopter;

class AdopterSeeder extends Seeder
{
    public function run()
    {
        // create 10 adopters
        Adopter::factory()->count(30)->create();
    }
}
