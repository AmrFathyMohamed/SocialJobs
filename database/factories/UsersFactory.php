<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'FullName' => $this->faker->unique()->name(),
            'ProfilePhoto' => base64_encode($this->faker->image()),
            'PhoneNumber' => $this->faker->unique()->phoneNumber(),
            'Email' => $this->faker->unique()->safeEmail(),
            'Password' => $this->faker->password(),
            'IsAdmin' => $this->faker->boolean(),
            'Link' => $this->faker->userName
        ];
    }
}