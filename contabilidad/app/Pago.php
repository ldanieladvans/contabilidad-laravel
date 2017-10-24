<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pago";

    protected $fillable = ['pago_monto','pago_fecha','pago_formpago_cod','pago_formpago_nom','pago_moneda_cod','pago_moneda_nom','pago_tipo_cambio','pago_numoperc','pago_rfcemisor_ctaord','pago_nombanc_ordext','pago_cta_ordnte','pago_rfcrecept_ctaben','pago_cta_ben','pago_cert_pago','pago_sello_pago','pago_comp_id','pago_polz_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function comprobante()
    {
    	return $this->belongsTo('App\Comprobante','pago_comp_id');
    }

    public function poliza()
    {
    	return $this->belongsTo('App\Poliza','pago_polz_id');
    }

    public function pagorel()
    {
        return $this->hasMany('App\Pagorel','pagorel_pago_id');
    }

    public function impuestos()
    {
        return $this->hasMany('App\Impuesto','pagoimp_pago_id');
    }
}
