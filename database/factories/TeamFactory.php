<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'code' => $this->faker->numberBetween(0,9000),
            'start' => $this->faker->date,
            'hours' => 16,
            'color' => $this->faker->hexColor
        ];
    }
}
