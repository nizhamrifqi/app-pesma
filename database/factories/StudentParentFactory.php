<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentParentFactory extends Factory
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
            'parent_name' =>$this->faker->name(),
            'phone' => $this->faker->phonenumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city()
        ];
    }
}
