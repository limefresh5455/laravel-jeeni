<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role_id' => Role::whereIn('name',['artist','viewer'])->get()->random()->id,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'bio' => $this->faker->sentence(5),
            'facebook_social' => 'https://www.facebook.com',
            'twitter_social' => 'https://www.twitter.com',
            'linkedin_social' => 'https://www.linkedinn.com',
            'instagram_social' => 'https://www.instagram.com',
            'website_social' => 'https://www.website.com',
            'youtube_social' => 'https://www.youtube.com',
            'paypal_link' => 'https://www.paypal.com'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
