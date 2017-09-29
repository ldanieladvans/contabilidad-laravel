<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveed";

    protected $fillable = ['proveed_nom','proveed_rfc','proveed_email','proveed_tel','proveed_forma_contab','proveed_concepto_polz','proveed_nom_contct','proveed_tel_contct','proveed_email_contct','proveed_nom_contct_otro','proveed_tel_contct_otro','proveed_email_contct_otro','proveed_cta_egreso_id','proveed_cta_desc_id','proveed_cta_iva_acredit_x_cob_id','proveed_cta_iva_acredit_cob_id','proveed_cta_iva_reten_x_cob_id','proveed_cta_iva_reten_cob_id','proveed_cta_isr_reten_id','proveed_cta_por_pagar_id','proveed_cta_anticp_prov_id','proveed_tipprov_id','proveed_direc_id','proveed_cta_isr_reten_cob_id','proveed_cta_ieps_por_cobrar_id','proveed_cta_ieps_cobrado_id','proveed_cta_ieps_reten_por_cobrar_id','proveed_cta_ieps_reten_cobrado_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function tipoproveedor()
    {
    	return $this->belongsTo('App\TipoProveedor','proveed_tipprov_id');
    }

    public function direccion()
    {
    	return $this->belongsTo('App\Direccion','proveed_direc_id');
    }

    public function gastosXProducto()
    {
        return $this->hasMany('App\GastosProducto','prodgast_proveed_id');
    }

    public function cuentaEgreso()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_egreso_id');
    }

    public function cuentaDescuento()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_desc_id');
    }

    public function cuentaIvaAcredXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_iva_acredit_x_cob_id');
    }

    public function cuentaIvaAcredCobrado()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_iva_acredit_cob_id');
    }

    public function cuentaIvaRetenXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_iva_reten_x_cob_id');
    }

    public function cuentaIvaRetenCobrado()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_iva_reten_cob_id');
    }

    public function cuentaIsrRetenXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_isr_reten_id');
    }

    public function cuentaIsrRetenCobrado()
    {
        return $this->belongsTo('App\Cuenta','proveed_cta_isr_reten_cob_id');
    }

    public function cuentaXPagar()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_por_pagar_id');
    }

    public function cuentaAnticProv()
    {
    	return $this->belongsTo('App\Cuenta','proveed_cta_anticp_prov_id');
    }

    public function cuentaIepsTrasladXCobrar()
    {
        return $this->belongsTo('App\Cuenta','proveed_cta_ieps_por_cobrar_id');
    }

    public function cuentaIepsTrasladCobrado()
    {
        return $this->belongsTo('App\Cuenta','proveed_cta_ieps_cobrado_id');
    }

    public function cuentaIepsRetenXCobrar()
    {
        return $this->belongsTo('App\Cuenta','proveed_cta_ieps_reten_por_cobrar_id');
    }

    public function cuentaIepsRetenCobrado()
    {
        return $this->belongsTo('App\Cuenta','proveed_cta_ieps_reten_cobrado_id');
    }
}
