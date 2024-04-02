<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('signos', function (Blueprint $table) {
            $table->id();
            $table->string('signo');
            $table->date('fecha');
            $table->string('prediction_es'); // Predicción en español
            $table->string('prediction_en'); // Predicción en inglés
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signos');
    }
};
