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
        Schema::create('orden_manos', function (Blueprint $table) {
            $table->unsignedBigInteger('numero_orden');
            $table->unsignedBigInteger('mano_id');
            $table->bigInteger('costo');
            $table->primary(['numero_orden', 'mano_id']);
            $table->foreign('numero_orden')->references('numero_orden')->on('orden_trabajos')->onDelete('cascade');
            $table->foreign('mano_id')->references('id')->on('manoobras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_manos');
    }
};
