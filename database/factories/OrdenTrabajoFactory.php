<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdenTrabajo>
 */
class OrdenTrabajoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $patente_tabla = Vehiculo::pluck('patente')->toArray();

        return [
            'fecha_ingreso' => fake()->date($format = 'y-m-d'),
            'fecha_retiro' => fake()->date($format = 'y-m-d'),
            'patente' => fake()->randomElement($patente_tabla),
            'kilometraje' => fake()->numberBetween(100000, 999999),
            'observaciones' => fake()->paragraph(),
        ];
    }
}
