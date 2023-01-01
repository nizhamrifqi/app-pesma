<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
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
            'name_room' => $this->faker->regexify('[A-D]{1}[2-5]{1}-[0-1]{1}[1-12]{1}'),
            'floor' => $this->faker->regexify('[2-5]{1}')
        ];
    }
}
