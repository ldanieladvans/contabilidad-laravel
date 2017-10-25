<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $table = "tipcliente";

    protected $fillable = ['tipcliente_desc','tipcliente_concpto_polz','tipcliente_cta_ingreso_id','tipcliente_cta_desc_id','tipcliente_cta_iva_traslad_x_cob_id','tipcliente_cta_iva_traslad_cob_id','tipcliente_cta_iva_reten_x_cob_id','tipcliente_cta_iva_reten_cob_id','tipcliente_cta_isr_reten_id','tipcliente_cta_por_cobrar_id','tipcliente_cta_anticp_client_id','tipcliente_cta_isr_reten_cob_id','tipcliente_cta_ieps_por_cobrar_id','tipcliente_cta_ieps_cobrado_id','tipcliente_cta_ieps_reten_por_cobrar_id','tipcliente_cta_ieps_reten_cobrado_id','tipcliente_defecto'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function clientes()
    {
        return $this->hasMany('App\Cliente','cliente_tipcliente_id');
    }

    public function ingresosXProducto()
    {
        return $this->hasMany('App\IngresosProducto','prodingr_tipcliente_id');
    }

    public function cuentaIngreso()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_ingreso_id');
    }

    public function cuentaDescuento()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_desc_id');
    }

    public function cuentaIvaTraslXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_iva_traslad_x_cob_id');
    }

    public function cuentaIvaTraslCobrado()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_iva_traslad_cob_id');
    }

    public function cuentaIvaRetenXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_iva_reten_x_cob_id');
    }

    public function cuentaIvaRetenCobrado()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_iva_reten_cob_id');
    }

    public function cuentaIsrRetenXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_isr_reten_id');
    }

    public function cuentaIsrRetenCobrado()
    {
        return $this->belongsTo('App\Cuenta','tipcliente_cta_isr_reten_cob_id');
    }

    public function cuentaXCobrar()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_por_cobrar_id');
    }

    public function cuentaAnticTipoCliente()
    {
    	return $this->belongsTo('App\Cuenta','tipcliente_cta_anticp_client_id');
    }

    public function cuentaIepsTrasladXCobrar()
    {
        return $this->belongsTo('App\Cuenta','tipcliente_cta_ieps_por_cobrar_id');
    }

    public function cuentaIepsTrasladCobrado()
    {
        return $this->belongsTo('App\Cuenta','tipcliente_cta_ieps_cobrado_id');
    }

    public function cuentaIepsRetenXCobrar()
    {
        return $this->belongsTo('App\Cuenta','tipcliente_cta_ieps_reten_por_cobrar_id');
    }

    public function cuentaIepsRetenCobrado()
    {
        return $this->belongsTo('App\Cuenta','tipcliente_cta_ieps_reten_cobrado_id');
    }
}
