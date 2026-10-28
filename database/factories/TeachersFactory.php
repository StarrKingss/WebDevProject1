<?php

namespace Database\Factories;

use App\Models\Teachers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Teachers>
 */
class TeachersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'niy' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'subjects' => fake()->randomElement(['Pendidikan Agama dan Budi Pekerti',
    'Pendidikan Pancasila',
    'Bahasa Indonesia',
    'Matematika',
    'Bahasa Inggris',
    'Sejarah',
    'Pendidikan Jasmani, Olahraga, dan Kesehatan',
    'Seni Budaya',
    'Informatika',]),
            'start_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        ];
    }
}
