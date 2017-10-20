<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provision extends Model
{
    protected $table = "provis";

    protected $fillable = ['provis_monto','provis_moneda_cod','provis_moneda_nom','provis_tipo_cambio','provis_comp_id','provis_metpago_cod','provis_formpago_cod'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function comprobante()
    {
    	return $this->belongsTo('App\Comprobante','provis_comp_id');
    }

    public function impuestos()
    {
        return $this->hasMany('App\ProvisionImpuestos','provisimp_provis_id');
    }
}
