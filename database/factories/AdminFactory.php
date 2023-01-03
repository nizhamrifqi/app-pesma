<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
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
            'username' => $this->faker->userName(),
            'full_name' =>$this->faker->name(),
            'password' => Hash::make('12345'),
            'status' => $this->faker->numberBetween(2, 3)
        ];
    }
}
