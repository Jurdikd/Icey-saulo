<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Facilitador>
 */
class facilitadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstname(),
            'apellido' => $this->faker->name(),
            'cedula' => $this->faker->randomDigit(),
            'fecha_nacimiento' => '2022-11-16',
            'telefono' => $this->faker->phoneNumber(),
            'parroquia_id' => '1'
        ];
    }
}   