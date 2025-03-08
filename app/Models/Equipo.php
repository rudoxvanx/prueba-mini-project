<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'equipoId';
    protected $fillable = ['clave', 'marca','modelo','serie','estatus'];
}
