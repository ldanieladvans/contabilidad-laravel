<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
     protected $table = "pagoimp";

    protected $fillable = ['pagoimp_total_reten','pagoimp_total_trasl','pagoimp_pago_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

   
    public function pago()
    {
    	return $this->belongsTo('App\Pago','pagoimp_pago_id');
    }

  
     public function detalleImpuestos()
    {
        return $this->hasMany('App\DetalleImpuesto','impdet_pagoimp_id');
    }
}
