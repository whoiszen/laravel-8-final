<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdopterFactory extends Factory
{
    protected $model = \App\Models\Adopter::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'contact_number' => $this->faker->phoneNumber(),
        ];
    }
}
