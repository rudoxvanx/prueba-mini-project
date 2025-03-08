<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\HistorialController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('equipos', EquipoController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('prestamos', PrestamoController::class);
Route::resource('historials', HistorialController::class);
