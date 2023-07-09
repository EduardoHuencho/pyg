<?php

namespace Database\Factories;

use App\Models\Manoobra;
use App\Models\OrdenTrabajo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdenMano>
 */
class OrdenManoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $num_orden = OrdenTrabajo::pluck('numero_orden')->toArray();
        $id_mano = Manoobra::pluck('id')->toArray();

        return [
            'numero_orden' => fake()->randomElement($num_orden),
            'mano_id' => fake()->randomElement($id_mano),
            'costo' => fake()->numberBetween(9990, 49990),
        ];
    }
}
