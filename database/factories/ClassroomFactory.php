<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->randomElement(['X PPLG 1', 'X PPLG 2','X PPLG 3', 'XI PPLG 1', 'XI PPLG 2','XI PPLG 3', 'XII PPLG 1', 'XII PPLG 2', 'XII PPLG 3','X ANIMASI 1', 'X ANIMASI 2','X ANIMASI 3', 'XI ANIMASI 1', 'XI ANIMASI 2','XI ANIMASI 3', 'XII ANIMASI 1', 'XII ANIMASI 2', 'XII ANIMASI 3','X DKV 1', 'X DKV 2','X DKV 3', 'XI DKV 1', 'XI DKV 2','XI DKV 3', 'XII DKV 1', 'XII DKV 2', 'XII DKV 3']),
            'major' => fake()->randomElement(['PPLG', 'DKV', 'ANIMASI']),
        ];
    }
}
