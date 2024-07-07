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
        Schema::create('auto', function (Blueprint $table) {
            $table->id();
            //FK hacia tipo auto
            $table->unsignedBigInteger('tipo_auto');
            $table->foreign('tipo_auto')->references('id')->on('tipo_auto')->onDelete('cascade');

            //FK hacia marca auto
            $table->unsignedBigInteger('marca');
            $table->foreign('marca')->references('id')->on('marca')->onDelete('cascade');
            $table->string('nombre_auto');
            $table->string('color');
            $table->string('placa');
            $table->string('anio');
            $table->string('foto')->nullable();
            $table->boolean('estado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto');
    }
};
