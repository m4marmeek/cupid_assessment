<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->freeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'date_of_birth' => $this->faker->dateTimeBetween('-50 years', '-15 years'),
            'gender' => $this->faker->randomElement(['Male', 'female']),
            'annual_income' => $this->faker->numberBetween('10000', '500000'),
            'occupation' => $this->faker->randomElement(['Private job', 'Government Job', 'Business']),
            'family_type' => $this->faker->randomElement(['Joint family', 'Nuclear family']),
            'manglik' => $this->faker->boolean(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('adminpass'), // adminpass
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
