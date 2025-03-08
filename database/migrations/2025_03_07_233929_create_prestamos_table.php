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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('prestamoId');
            $table->string('clavePrestamo');
            $table->date('fechaPrestamo');
            $table->date('fechaDevolucion');
            $table->enum('estatus', ['prestado', 'devuelto','reasignado']);
            $table->string('observaciones');

            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('empleadoId')->on('empleados');

            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('equipoId')->on('equipos');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos',function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
