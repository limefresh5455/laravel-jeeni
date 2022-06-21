<?php

namespace Database\Factories;

use App\Models\Showcase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
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
            'showcase_id' => Showcase::all()->random()->id,
            'title' => $this->faker->sentence(4),
            'track_file' => '',
            'thumbnail' => '',
            'is_active' => $this->faker->boolean()
        ];
    }
}
