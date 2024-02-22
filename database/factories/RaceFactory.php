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
        $districts = [
            'aveiro', 'beja', 'braga', 'bragança', 'castelo_branco', 'coimbra',
            'evora', 'faro', 'guarda', 'leiria', 'lisboa', 'portalegre', 'porto',
            'santarem', 'setubal', 'viana_do_castelo', 'vila_real', 'viseu'
        ];

        return [
            'name' => $this->faker->unique()->name,
            'image_path' => $this->faker->imageUrl(),
            'district' => $this->faker->randomElement($districts),
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'minimum_condition' => $this->faker->randomElement(['iniciante', 'experiente', 'avançado']),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->optional()->time('H:i'),
            'date' => $this->faker->date('Y-m-d', '2023-10-25'),
            'has_accessibility' => $this->faker->boolean,
        ];
    }
}
