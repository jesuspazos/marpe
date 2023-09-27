<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    // use Traits\CompositePrimaryKey;

    protected $table = 'subcategorias';
    protected $primaryKey = 'idsubCategoria';
    // protected $primaryKey = 'idsubCategoria';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
    	'cNombre',
        'idcategoria'
    ];

}