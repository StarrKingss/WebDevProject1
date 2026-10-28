<?php

namespace Database\Factories;

use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subjects>
 */
class SubjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'name' => fake()->randomElement(['Pendidikan Agama dan Budi Pekerti',
    'Pendidikan Pancasila',
    'Bahasa Indonesia',
    'Matematika',
    'Bahasa Inggris',
    'Sejarah',
    'Pendidikan Jasmani, Olahraga, dan Kesehatan',
    'Seni Budaya',
    'Informatika',]),
        ];
    }
}
