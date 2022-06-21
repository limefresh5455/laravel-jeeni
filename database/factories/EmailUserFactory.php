<?php

namespace Database\Factories;

use App\Models\Email;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;

class EmailUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'email_id' => Email::where('Is_final', true)->get()->random()->id,
            'user_id' => User::all()->random()->id,
            'status' => $this->faker->boolean(),
        ];
    }
}
