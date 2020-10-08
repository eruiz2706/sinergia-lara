<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table="ciudades";

    protected $fillable = [
        'codigo',
        'nombre',
        'departamento_id'
    ];

    protected $hidden = ['created_at','updated_at'];
}
