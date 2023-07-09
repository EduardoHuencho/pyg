<?php

namespace Database\Factories;

use App\Models\OrdenTrabajo;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdenProducto>
 */
class OrdenProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $num_orden = OrdenTrabajo::pluck('numero_orden')->toArray();
        $id_producto = Producto::pluck('id')->toArray();

        return [
            'numero_orden' => fake()->randomElement($num_orden),
            'producto_id' => fake()->randomElement($id_producto),
            'cantidad' => fake()->numberBetween(1, 999),
            'precio' => fake()->numberBetween(9990, 49990),
            'precio_total' => fake()->numberBetween(9990, 49990),
        ];
    }
}
