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

        $classes = [
            '10 PPLG 1',
            '10 PPLG 2',
            '10 PPLG 3',
            '11 PPLG 1',
            '11 PPLG 2',
            '11 PPLG 3',
            '12 PPLG 1',
            '12 PPLG 2',
            '12 PPLG 3',
            '11 TJKT 1',
        ];

        return [
            'name' => fake()->unique()->randomElement($classes),
            'major' => fake()->randomElement([
                'PPLG',
                'TJKT',
                'DKV',
            ]),
        ];
    }
}
