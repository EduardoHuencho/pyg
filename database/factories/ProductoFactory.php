<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cod_prod' => fake()->unique()->text(),
            'precio' => fake()->numberBetween(9990, 49990),
            'stock' => fake()->numberBetween(1, 1000),
            'descripcion' => fake()->paragraph(),
        ];
    }
}
