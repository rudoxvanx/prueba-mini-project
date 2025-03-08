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
        Schema::create('historials', function (Blueprint $table) {
            $table->id('historialId');
            $table->date('fechaRegistro');
            $table->enum('estatus', ['prestado', 'devuelto','reasignado']);

            $table->unsignedBigInteger('prestamo_id');
            $table->foreign('prestamo_id')->references('prestamoId')->on('prestamos');

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
        Schema::dropIfExists('historials',function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
