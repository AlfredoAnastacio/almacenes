<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{

    public $table = 'cat_productos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku', 'descripcion', 'marca', 'color', 'precio'
    ];
}
