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
        Schema::create('arriendo_auto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auto')->constrained('auto');
            $table->foreignId('usuario')->constrained('users');
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
