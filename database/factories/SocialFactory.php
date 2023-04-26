<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Social>
 */
class SocialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $Links = $this->faker->randomElement(['Facebook','Twitter','Snapchat','WhatsApp','Linkedin','Youtube','Tiktok']);
        return [
            'Name' =>$Links,
            'Link' => $this->faker->imageUrl(),
            'UserId' => Users::inRandomOrder()->first()->id,
        ];
    }
}
