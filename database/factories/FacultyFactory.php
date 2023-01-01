<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name_faculty' => $this->faker->text(25),
            'short' => $this->faker->regexify('[A-Z]{3}')
        ];
    }
}
