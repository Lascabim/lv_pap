<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Race>
 */
class RaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'image_path' => $this->faker->imageUrl(),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'minimum_condition' => $this->faker->randomElement(['low', 'medium', 'high']),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->optional()->time('H:i'),
            'date' => $this->faker->date('Y-m-d', '2024-10-05'),
            'has_accessibility' => $this->faker->boolean,
            'url' => $this->faker->url,
        ];
    }
}
