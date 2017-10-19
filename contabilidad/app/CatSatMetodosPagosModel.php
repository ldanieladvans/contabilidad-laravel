<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatSatMetodosPagosModel extends Model
{
    protected $table='cat_sat_metodos_pago';

 
    protected $fillable =  array('clave', 'concepto');

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }
}
