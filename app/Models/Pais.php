<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table="paises";

    protected $fillable = [
        'codigo',
        'nombre'
    ];

    protected $hidden = ['created_at','updated_at'];
}
