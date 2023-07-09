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
        Schema::create('orden_productos', function (Blueprint $table) {
            $table->unsignedBigInteger('numero_orden');
            $table->unsignedBigInteger('producto_id');
            $table->bigInteger('cantidad');
            $table->bigInteger('precio');
            $table->bigInteger('precio_total');
            $table->primary(['numero_orden', 'producto_id']);
            $table->foreign('numero_orden')->references('numero_orden')->on('orden_trabajos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_productos');
    }
};

