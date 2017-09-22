<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProveedor extends Model
{
    protected $table = "tipprov";

    protected $fillable = ['tipprov_desc','tipprov_concpto_polz','tipprov_cta_egreso_id','tipprov_cta_desc_id','tipprov_cta_iva_acredit_x_cob_id','tipprov_cta_iva_acredit_cob_id','tipprov_cta_iva_reten_x_cob_id','tipprov_cta_iva_reten_cob_id','tipprov_cta_isr_reten_id','tipprov_cta_por_pagar_id','tipprov_cta_anticp_prov_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function proveedores()
    {
        return $this->hasMany('App\Proveedor','proveed_tipprov_id');
    }

    public function gastosXProducto()
    {
        return $this->hasMany('App\GastosProducto','prodgast_tipprov_id');
    }

    public function cuentaEgreso()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_egreso_id');
    }

    public function cuentaDescuento()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_desc_id');
    }

    public function cuentaIvaAcredXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_iva_acredit_x_cob_id');
    }

    public function cuentaIvaAcredCobrado()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_iva_acredit_cob_id');
    }

    public function cuentaIvaRetenXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_iva_reten_x_cob_id');
    }

    public function cuentaIvaRetenCobrado()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_iva_reten_cob_id');
    }

    public function cuentaIsrReten()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_isr_reten_id');
    }

    public function cuentaXPagar()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_por_pagar_id');
    }

    public function cuentaAnticTipoProv()
    {
    	return $this->belongsTo('App\Cuenta','tipprov_cta_anticp_prov_id');
    }



}
