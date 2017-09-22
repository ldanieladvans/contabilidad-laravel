<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "direc";

    protected $fillable = ['direc_calle','direc_num_ext','direc_num_int','direc_colonia','direc_localidad','direc_municipio','direc_estado','direc_pais','direc_cp','direc_referencia'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }


    public function clientes()
    {
        return $this->hasMany('App\Cliente','cliente_direc_id');
    }

    public function proveedores()
    {
        return $this->hasMany('App\Proveedor','proveed_direc_id');
    }
}
