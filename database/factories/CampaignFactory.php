<?php

namespace Database\Factories;

use App\Models\Showcase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
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
            'subject' => $this->faker->sentence(4),
            'photo' => '',
            'from' => now(),
            'to' => now()->addDays(rand(1,10)),
            'description' => $this->faker->text(),
            'is_active' => $this->faker->boolean()
        ];
    }
}
