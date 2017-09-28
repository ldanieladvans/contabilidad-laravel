<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigNomina extends Model
{
    protected $table = "confnom";

    protected $fillable = ['confnom_contabiliz_nom','confnom_prov_nom_cta_id','confnom_percep_cta_id','confnom_retenc_cta_id','confnom_otrospag_cta_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function cuentaProvision()
    {
    	return $this->belongsTo('App\Cuenta','confnom_prov_nom_cta_id');
    }

    public function cuentaPercepcion()
    {
    	return $this->belongsTo('App\Cuenta','confnom_percep_cta_id');
    }

    public function cuentaRetencion()
    {
    	return $this->belongsTo('App\Cuenta','confnom_retenc_cta_id');
    }

    public function cuentaOtroPago()
    {
    	return $this->belongsTo('App\Cuenta','confnom_otrospag_cta_id');
    }
}
