<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IntervalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = $this->faker->randomNumber(5);
        return [
            'start' => $start,
            'end' => $this->faker->optional()->numberBetween($start, 99999),
        ];
    }
}
