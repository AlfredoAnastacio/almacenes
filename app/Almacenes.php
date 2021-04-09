<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacenes extends Model
{

    public $table = 'cat_almacenes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_almacen', 'localizacion', 'responsable', 'tipo'
    ];
}
