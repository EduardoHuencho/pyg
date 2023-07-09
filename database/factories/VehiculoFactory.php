<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Modelo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_modelo = Modelo::pluck('id')->toArray();
        $rut_cliente = Cliente::pluck('rut')->toArray();

        return [
            'patente' => fake()->unique()->numberBetween(100000, 999999),
            'modelo_id' => fake()->randomElement($id_modelo),
            'anio' => fake()->numberBetween(1000, 9999),
            'rut' => fake()->randomElement($rut_cliente),
        ];
    }
}
