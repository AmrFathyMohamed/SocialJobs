<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Name' =>$this->faker->paragraph(1,true),
            'Photo' => base64_encode($this->faker->image()),
            'VideoFrame' => $this->faker->imageUrl(),
            'Discription'  =>$this->faker->paragraph(3,true),
            'Link' => $this->faker->url,
            'UserId' => Users::inRandomOrder()->first()->id,
        ];
    }
}
