<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table="departamentos";

    protected $fillable = [
        'codigo',
        'nombre'
    ];

    protected $hidden = ['created_at','updated_at'];
}
