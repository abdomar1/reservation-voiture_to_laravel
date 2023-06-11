<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marque'=>fake()->company(),
            'model'=>fake()->year(),
            'type'=>fake()->word(),
            'prixJ'=>fake()->randomNumber(),
            'image'=>fake()->image(null, 640, 480),
            'disponible'=>fake()->randomDigit(0,1),
        ];
    }
}
