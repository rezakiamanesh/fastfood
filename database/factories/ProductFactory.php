<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(1,65000),
            'stock' => $this->faker->numberBetween(1,50),
            'time_to_prepare' => $this->faker->numberBetween(1,60),
            'status' => $this->faker->numberBetween(1,2),
        ];
    }
}
