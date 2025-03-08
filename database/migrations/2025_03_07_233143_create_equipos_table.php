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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('equipoId');
            $table->string('clave');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serie');

            $table->enum('estatus', ['disponible', 'no disponible']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos',function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
