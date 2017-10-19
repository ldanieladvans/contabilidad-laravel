<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatSatBancosModel extends Model
{
    protected $table='cat_sat_bancos';
 
    protected $fillable =  array('cat_sat_bancos_clave', 'cat_sat_bancos_nombre_corto', 'cat_sat_bancos_razon_social');
}
