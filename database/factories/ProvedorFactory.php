<?php

namespace Database\Factories;

use App\Models\Identification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provedor>
 */
class ProvedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'identifications_id' => Identification::inRandomOrder()->first()->id,
            'identification' => $this->faker->ruc(true),
            'name' => $this->faker->company(),
            'direccion' => $this->faker->address(),
            'emcargado' => $this->faker->name('male'|'female'),
            'email' => $this->faker->email(),
            'telefono' => $this->faker->e164PhoneNumber(),
            'estado' => $this->faker->boolean()
        ];
    }
}
