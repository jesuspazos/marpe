<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContenidoPagina extends Model
{
    use Traits\CompositePrimaryKey;

    protected $table = 'contenido_pagina';
    protected $primaryKey = array('menu','seccion');//[];
    //protected $primaryKey = 'seccion';
    public $incrementing = false;
    public $timestamps = false;

}