<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Marca::factory(50)->create();
        \App\Models\Modelo::factory(10)->create();
        \App\Models\Cliente::factory(10)->create();
        \App\Models\Vehiculo::factory(10)->create();
        \App\Models\Producto::factory(30)->create();
        \App\Models\Manoobra::factory(30)->create();
        \App\Models\OrdenTrabajo::factory(30)->create();
        \App\Models\OrdenProducto::factory(10)->create();
        \App\Models\OrdenMano::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
