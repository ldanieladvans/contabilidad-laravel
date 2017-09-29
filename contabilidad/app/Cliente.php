<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";

    protected $fillable = ['cliente_nom','cliente_rfc','cliente_email','cliente_tel','cliente_forma_contab','cliente_concepto_polz','cliente_nom_contct','cliente_tel_contct','cliente_email_contct','cliente_nom_contct_otro','cliente_tel_contct_otro','cliente_email_contct_otro','cliente_cta_ingreso_id','cliente_cta_desc_id','cliente_cta_iva_traslad_x_cob_id','cliente_cta_iva_traslad_cob_id','cliente_cta_iva_reten_x_cob_id','cliente_cta_iva_reten_cob_id','cliente_cta_isr_reten_id','cliente_cta_por_cobrar_id','cliente_cta_anticp_client_id','cliente_tipcliente_id','cliente_direc_id','cliente_cta_isr_reten_cob_id','cliente_cta_ieps_por_cobrar_id','cliente_cta_ieps_cobrado_id','cliente_cta_ieps_reten_por_cobrar_id','cliente_cta_ieps_reten_cobrado_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }


    public function ingresosXProducto()
    {
        return $this->hasMany('App\IngresosProducto','prodingr_cliente_id');
    }

    public function tipoCliente()
    {
    	return $this->belongsTo('App\TipoCliente','cliente_tipcliente_id');
    }

    public function direccion()
    {
    	return $this->belongsTo('App\Direccion','cliente_direc_id');
    }

    public function cuentaIngreso()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_ingreso_id');
    }

    public function cuentaDescuento()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_desc_id');
    }

    public function cuentaIvaTraslXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_iva_traslad_x_cob_id');
    }

    public function cuentaIvaTraslCobrado()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_iva_traslad_cob_id');
    }

    public function cuentaIvaRetenXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_iva_reten_x_cob_id');
    }

    public function cuentaIvaRetenCobrado()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_iva_reten_cob_id');
    }

    public function cuentaIsrRetenXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_isr_reten_id');
    }

    public function cuentaIsrRetenCobrado()
    {
        return $this->belongsTo('App\Cuenta','cliente_cta_isr_reten_cob_id');
    }

    public function cuentaXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_por_cobrar_id');
    }

    public function cuentaAnticTipoCliente()
    {
    	return $this->belongsTo('App\Cuenta','cliente_cta_anticp_client_id');
    }

    public function cuentaIepsTrasladXCobrar()
    {
        return $this->belongsTo('App\Cuenta','cliente_cta_ieps_por_cobrar_id');
    }

    public function cuentaIepsTrasladCobrado()
    {
        return $this->belongsTo('App\Cuenta','cliente_cta_ieps_cobrado_id');
    }

    public function cuentaIepsRetenXCobrar()
    {
        return $this->belongsTo('App\Cuenta','cliente_cta_ieps_reten_por_cobrar_id');
    }

    public function cuentaIepsRetenCobrado()
    {
        return $this->belongsTo('App\Cuenta','cliente_cta_ieps_reten_cobrado_id');
    }


}
