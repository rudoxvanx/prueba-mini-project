<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'empleadoId';
    protected $fillable = ['nombre', 'area','correo','telefono'];
}
