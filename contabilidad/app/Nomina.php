<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    protected $table = "nom";

    protected $fillable = ['nom_tiponom','nom_f_inicial_pago','nom_f_final_pago','nom_num_dias_pagados','nom_total_percep','nom_total_deduc','nom_total_otrospag','nom_total_sueldo','nom_total_separindemn','nom_total_jubilpens','nom_percep_grav','nom_percep_exent','nom_total_otrasdeduc','nom_total_impreten','nom_comp_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function comprobante()
    {
    	return $this->belongsTo('App\Comprobante','nom_comp_id');
    }

    public function nominaDetalles()
    {
        return $this->hasMany('App\NominaDetalle','nomdet_nom_id');
    }
}
