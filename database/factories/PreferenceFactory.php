<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PreferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $salaryRange = [$this->faker->numberBetween('10000', '100000'), $this->faker->numberBetween('100001', '500000')];
        $manglik = $this->faker->randomElement([$this->faker->randomElement(['Yes', 'No']), 'Both']);
        return [
            'salary_range' => $salaryRange,
            'occupation' => $this->faker->randomElements(['Private job', 'Government Job', 'Business'], $this->faker->numberBetween(1, 3)),
            'family_type' => $this->faker->randomElements(['Joint family', 'Nuclear family'], $this->faker->numberBetween(1, 2)),
            'manglik' => $manglik,
        ];
    }
}
