<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleImpuesto extends Model
{
    protected $table = "impdet";

    protected $fillable = ['impdet_tipo','impdet_imp_cod','impdet_imp_nom','impdet_importe','impdet_tipofact_cod','impdet_tasacuota','impdet_pagoimp_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

   
    public function impuesto()
    {
    	return $this->belongsTo('App\Impuesto','impdet_pagoimp_id');
    }
}
