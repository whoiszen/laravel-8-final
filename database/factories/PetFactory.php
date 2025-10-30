<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    protected $model = \App\Models\Pet::class;

    public function definition()
    {
        $types = ['Dog','Cat','Rabbit','Bird','Hamster'];
        return [
            'name' => $this->faker->firstName(),
            'type' => $this->faker->randomElement($types),
            'age' => $this->faker->numberBetween(1,10),
            'status' => 'available',
        ];
    }
}
