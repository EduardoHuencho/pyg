<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rut' => fake()->unique()->numberBetween(100000000, 999999999),
            'nombre' => fake()->name(),
            'tipo' => fake()->randomElement(['PARTICULAR', 'EMPRESA']),
            'telefono' => fake()->numberBetween(100000000, 999999999),
            'celular' => fake()->numberBetween(10000000, 99999999),
            'correo' => fake()->unique()->safeEmail(),
            'direccion' => fake()->sentence(),
        ];
    }
}
