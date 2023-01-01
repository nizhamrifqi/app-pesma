<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->regexify('[A-Z]{1}[1-2]{1}00[0-9]{6}'),
            'full_name' => $this->faker->name(),
            'gender' => $this->faker->randomElement($array = array('Male', 'Female')),
            'room_id' => $this->faker->regexify('[1-9]{1}'),
            'faculty_id' => $this->faker->regexify('[1-9]{1}'),
            'parent_id' => $this->faker->regexify('[1-9]{1}'),
            'password' => Hash::make('12345'),
            'phone' => $this->faker->numerify('08#########')
        ];
    }
}
