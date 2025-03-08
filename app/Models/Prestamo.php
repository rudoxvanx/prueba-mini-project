<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'prestamoId';
    protected $fillable = ['clavePrestamo', 'fechaPrestamo','fechaDevolucion','estatus','observaciones','empleado_id','equipo_id'];
}
