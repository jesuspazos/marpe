<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // use Traits\CompositePrimaryKey;

    protected $table = 'categoria';
    protected $primaryKey = 'idCategoria';//array('idCategoria');
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
    	'nombre',
    	'activo'
    ];

}