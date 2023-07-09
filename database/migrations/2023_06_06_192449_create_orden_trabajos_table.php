<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->bigIncrements('numero_orden');
            $table->dateTime('fecha_ingreso', $precision = 0);
            $table->dateTime('fecha_retiro', $precision = 0);
            $table->string('patente');
            $table->bigInteger('kilometraje');
            $table->text('observaciones');
            $table->foreign('patente')->references('patente')->on('vehiculos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_trabajos');
    }
};
