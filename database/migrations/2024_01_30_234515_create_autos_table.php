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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidads');
            $table->string('chasis')->unique();
            $table->string('motor_serie')->unique();
            $table->integer('km');
            $table->string('color');
            $table->integer('anio');
            $table->integer('precio');
            $table->string('transmision');
            $table->string('placa')->unique();
            $table->unsignedBigInteger('motor_id');
            $table->boolean('disponible');
            $table->unsignedBigInteger('despacho_id');
            $table->foreign('despacho_id')->references('id')->on('despachos')->onDelete('cascade');
            $table->foreign('motor_id')->references('id')->on('motors');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
