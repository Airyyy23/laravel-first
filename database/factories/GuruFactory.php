<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'kelas_id' => fake()->numberBetween(1, 4),
            'tanggal_lahir' => fake()->dateTimeBetween('-17 years', '-15 years')->format('Y-m-d'),
            'alamat' => fake()->address(),
        ];
    }
}
