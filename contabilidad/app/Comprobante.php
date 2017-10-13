<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $table = "comp";

    protected $fillable = ['comp_uuid','comp_rfc_emisor','comp_rfc_receptor','comp_f_emision','comp_complmto','comp_tipocomp','comp_cbb_serie','comp_cbb_numfolio','comp_num_factelect','comp_taxid','comp_espago','comp_imp_bov'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function comprobantesRel()
    {
        return $this->hasMany('App\ComprobanteRel','comprel_comp_id');
    }

    public function provision()
    {
        return $this->hasMany('App\Provision','provis_comp_id');
    }

    public function pagos()
    {
        return $this->hasMany('App\Pago','pago_comp_id');
    }

    public function polizas(){

        return $this->belongsToMany('App\Poliza','polzcomp','polzcomp_comp_id','polzcomp_polz_id');
    }

    public function nominas()
    {
        return $this->hasMany('App\Nomina','nom_comp_id');
    }

    public function getPolizas()
    {
        return (!$this->polizas) ? $this->polizas = $this->polizas()->get() : $this->polizas;
    }

    public function tienePoliza($poliza)
    {
        return $this->getPolizas()->contains(function ($value, $key) use ($poliza) {
            return $poliza == $value->id;
        });
    }

    
}
