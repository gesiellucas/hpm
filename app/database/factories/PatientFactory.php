<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullname' => fake()->name(),
            'mothername' => fake()->name(),
            'birthday' => fake()->date(),
            'cpf' => fake()->randomNumber(5),
            'cns' => fake()->randomNumber(5),
            'address_id' => Address::factory()
        ];
    }
}
