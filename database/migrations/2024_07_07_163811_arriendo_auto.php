<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arriendo_auto', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoincrement();

            //FK arriendo hacia auto
            $table->unsignedBigInteger('auto');
            $table->foreign('auto')->references('id')->on('auto')->onDelete('cascade');
            //FK arriendo hacia cliente
            $table->String('rut_cliente', 10);
            $table->foreign('rut_cliente')->references('rut')->on('clientes')->onDelete('cascade');

            $table->date('fecha_inicio')->default(now());
            $table->date('fecha_fin');
            $table->date('fecha_entrega')->nullable();
            $table->date('fecha_devolucion')->nullable();
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arriendo_auto');
    }
};
