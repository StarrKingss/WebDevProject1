<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->name(),
            'nis' => fake()->unique()->randomNumber(5, true),
            //'classroom'=> fake()->randomElement(['X PPLG 1', 'X PPLG 2', 'XI PPLG 1', 'XI PPLG 2', 'XII PPLG 1', 'XII PPLG 2']),
            'classroom_id' => Classroom::factory(),
        ];
    }
}
