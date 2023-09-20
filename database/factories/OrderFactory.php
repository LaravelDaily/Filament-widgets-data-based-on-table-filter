<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'number'     => 'OR' . $this->faker->unique()->randomNumber(6),
            'status'     => $this->faker->randomElement(['new', 'confirmed', 'cancelled']),
            'created_at' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
