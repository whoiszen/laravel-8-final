<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pet;
use App\Models\Adopter;

class AdoptionFactory extends Factory
{
    protected $model = \App\Models\Adoption::class;

    public function definition()
    {
        // pick a random pet and adopter — seeder will ensure uniqueness / status updates
        return [
            'pet_id' => Pet::inRandomOrder()->value('id'),
            'adopter_id' => Adopter::inRandomOrder()->value('id'),
            'date_adopted' => $this->faker->dateTimeBetween('-1 years','now')->format('Y-m-d'),
        ];
    }
}
