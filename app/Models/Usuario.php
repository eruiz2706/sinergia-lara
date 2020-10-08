<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table="usuarios";

    protected $fillable = [
        'nombre',
        'pais_id',
        'ciudad_id'
    ];

    protected $hidden = ['created_at','updated_at'];
}
