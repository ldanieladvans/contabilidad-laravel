<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatSatMonedasModel extends Model
{
    protected $table='cat_sat_monedas';
 
    protected $fillable =  array('cat_sat_monedas_codigo', 'cat_sat_monedas_nombre');

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }
}
