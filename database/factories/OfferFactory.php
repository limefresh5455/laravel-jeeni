<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence(4),
            'min_price' => $this->faker->numberBetween(1,20),
            'max_price' => $this->faker->numberBetween(21,40),
            'description' => $this->faker->paragraph(),
            'tags' => $this->faker->name(),
            'is_active' => $this->faker->boolean()
        ];
    }
}
