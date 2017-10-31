<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    protected $table = "asiento";

    protected $fillable = ['asiento_concepto','asiento_debe','asiento_haber','asiento_folio_ref','asiento_activo','asiento_ctacont_id','asiento_polz_id','asiento_manual','asiento_saldo_anterior','asiento_saldo_actual','asiento_fecha'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

   
    public function poliza()
    {
    	return $this->belongsTo('App\Poliza','asiento_polz_id');
    }

    public function cuenta()
    {
    	return $this->belongsTo('App\Cuenta','asiento_ctacont_id');
    }

    public function comprobanteRel()
    {
        return $this->hasMany('App\Pagorel','pagorel_asiento_id');
    }

    public function getPagos()
    {
        return (!$this->comprobanteRel) ? $this->comprobanteRel = $this->comprobanteRel()->get() : $this->comprobanteRel;
    }

    public function tienePago($pago)
    {
        return $this->getPagos()->contains(function ($value, $key) use ($pago) {
            return $pago == $value->id;
        });
    }


}
