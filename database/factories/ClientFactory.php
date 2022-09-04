<?php

// namespace  Faker\Provider\es_PE\Person;
namespace Database\Factories;

use App\Models\Identification;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\es_PE\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory 
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'identifications_id' => Identification::inRandomOrder()->first()->id,
            'identification' => $this->faker->dni(),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->e164PhoneNumber(),
            'direccion' => $this->faker->address()
        ];
    }
}
