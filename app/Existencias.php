<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Existencias extends Model
{
    public $table = 'existencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_producto', 'id_almacen', 'existencias'
    ];
}
