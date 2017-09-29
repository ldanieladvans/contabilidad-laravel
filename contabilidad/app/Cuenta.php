<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = "ctacont";

    protected $fillable = ['ctacont_catsat_cod','ctacont_catsat_nom','ctacont_tipocta_cod','ctacont_tipocta_nom','ctacont_num','ctacont_desc','ctacont_natur','ctacont_efectivo','ctacont_f_iniciosat','ctacont_decalarada','ctacont_pte_complnt','ctacont_tiposubcta_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function balanzas()
    {
        return $this->hasMany('App\Balanza','blnza_ctacont_id');
    }

    public function asientos()
    {
        return $this->hasMany('App\Asiento','asiento_ctacont_id');
    }

    public function tipoSubcuenta()
    {
    	return $this->belongsTo('App\TipoSubCuenta','ctacont_tiposubcta_id');
    }

    public function gastosProducto()
    {
        return $this->hasMany('App\GastosProducto','prodgast_cta_gast_id');
    }

    public function ingresosProducto()
    {
        return $this->hasMany('App\IngresosProducto','prodingr_cta_ingr_id');
    }

    public function formasPago()
    {
        return $this->hasMany('App\FormaPago','formpago_ctacont_id');
    }

    public function cuentasNominaProvision()
    {
        return $this->hasMany('App\ConfigNomina','confnom_prov_nom_cta_id');
    }

    public function cuentasNominaPercepcion()
    {
        return $this->hasMany('App\ConfigNomina','confnom_percep_cta_id');
    }

    public function cuentasNominaRetencion()
    {
        return $this->hasMany('App\ConfigNomina','confnom_retenc_cta_id');
    }

    public function cuentasNominaOtrosPagos()
    {
        return $this->hasMany('App\ConfigNomina','confnom_otrospag_cta_id');
    }

    public function cuentasConcepto()
    {
        return $this->hasMany('App\ConfigConcepto','confconc_cta_id');
    }



    


    
}
