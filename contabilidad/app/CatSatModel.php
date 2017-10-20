<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatSatModel extends Model
{
    protected $table='cat_sat';

    protected $fillable = ['cat_sat_nivel','cat_sat_codigo_agrupador','cat_sat_nombre_cuenta','cat_sat_tipo','cat_sat_subtipo'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }


}
