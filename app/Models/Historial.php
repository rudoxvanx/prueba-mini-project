<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historial extends Model
{
    //
    use SoftDeletes;
    protected $primaryKey = 'historialId';
    protected $fillable = ['fechaRegistro', 'estatus','prestamo_id','empleado_id','equipo_id'];
}
