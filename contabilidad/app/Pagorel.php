<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagorel extends Model
{
    protected $table = "pagorel";

    protected $fillable = ['pagorel_pagado_uuid','pagorel_serie','pagorel_folio','pagorel_formpago_cod','pagorel_formpago_nom','pagorel_moneda_cod','pagorel_moneda_nom','pagorel_tipo_cambio','pagorel_numparcldad','pagorel_sald_ant','pagorel_monto_pag','pagorel_sald_nuevo','pagorel_asiento_id','pagorel_pago_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

   
    public function asiento()
    {
    	return $this->belongsTo('App\Asiento','pagorel_asiento_id');
    }

    public function pago()
    {
    	return $this->belongsTo('App\Pago','pagorel_pago_id');
    }

     
}
