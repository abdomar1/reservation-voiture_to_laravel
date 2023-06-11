<?php

namespace Database\Factories;

use App\Models\car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::pluck('id')->random(),
            'car_id'=>car::pluck('id')->random(),
            'dateL'=>fake()->dateTime(),
            'dateR'=>fake()->dateTime(),
            'prixTTC'=>fake()->randomDigit(1000, 5000),
        ];
    }
}
