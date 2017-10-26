<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Scottlaurent\Accounting\ModelTraits\AccountingJournal;

class Cuenta extends Model
{
    use AccountingJournal;
    protected $table = "ctacont";

    protected $fillable = ['ctacont_catsat_cod','ctacont_catsat_nom','ctacont_tipocta_cod','ctacont_tipocta_nom','ctacont_num','ctacont_desc','ctacont_natur','ctacont_efectivo','ctacont_f_iniciosat','ctacont_decalarada','ctacont_pte_complnt','ctacont_tiposubcta_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
        //$this->initJournal('MXN');
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

    //Relaciones con nómina

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

    //Relaciones con tipo de cliente

    public function tipoClienteIngresos()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_ingreso_id');
    }

    public function tipoClienteDescuentos()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_desc_id');
    }

    public function tipoClienteIvaTraslXCobrar()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_iva_traslad_x_cob_id');
    }

    public function tipoClienteIvaTraslCobrado()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_iva_traslad_cob_id');
    }

    public function tipoClienteIvaRetenXCobrar()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_iva_reten_x_cob_id');
    }

    public function tipoClienteIvaRetenCobrado()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_iva_reten_cob_id');
    }

    public function tipoClienteIsrRetenXCobrar()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_isr_reten_id');
    }

    public function tipoClienteIsrRetenCobrado()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_isr_reten_cob_id');
    }

    public function tipoClienteCuentaXCobrar()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_por_cobrar_id');
    }

    public function tipoClienteCuentaAnticipo()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_anticp_client_id');
    }

    public function tipoClienteIepsTrasladXCobrar()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_ieps_por_cobrar_id');
    }

    public function tipoClienteIepsTrasladCobrado()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_ieps_cobrado_id');
    }

    public function tipoclienteIepsRetenXCobrar()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_ieps_reten_por_cobrar_id');
    }
    
    public function tipoclienteIepsRetenCobrado()
    {
        return $this->hasMany('App\TipoCliente','tipcliente_cta_ieps_reten_cobrado_id');
    }



    //Relaciones con cliente

    public function clienteIngresos()
    {
        return $this->hasMany('App\Cliente','cliente_cta_ingreso_id');
    }

    public function clienteDescuentos()
    {
        return $this->hasMany('App\Cliente','cliente_cta_desc_id');
    }

    public function clienteIvaTraslXCobrar()
    {
        return $this->hasMany('App\Cliente','cliente_cta_iva_traslad_x_cob_id');
    }

    public function clienteIvaTraslCobrado()
    {
        return $this->hasMany('App\Cliente','cliente_cta_iva_traslad_cob_id');
    }

    public function clienteIvaRetenXCobrar()
    {
        return $this->hasMany('App\Cliente','cliente_cta_iva_reten_x_cob_id');
    }

    public function clienteIvaRetenCobrado()
    {
        return $this->hasMany('App\Cliente','cliente_cta_iva_reten_cob_id');
    }

    public function clienteIsrRetenXCobrar()
    {
        return $this->hasMany('App\Cliente','cliente_cta_isr_reten_id');
    }

    public function clienteIsrRetenCobrado()
    {
        return $this->hasMany('App\Cliente','cliente_cta_isr_reten_cob_id');
    }

    public function clienteCuentaXCobrar()
    {
        return $this->hasMany('App\Cliente','cliente_cta_por_cobrar_id');
    }

    public function clienteCuentaAnticipo()
    {
        return $this->hasMany('App\Cliente','cliente_cta_anticp_client_id');
    }

    public function clienteIepsTrasladXCobrar()
    {
        return $this->hasMany('App\Cliente','cliente_cta_ieps_por_cobrar_id');
    }

    public function clienteIepsTrasladCobrado()
    {
        return $this->hasMany('App\Cliente','cliente_cta_ieps_cobrado_id');
    }

    public function clienteIepsRetenXCobrar()
    {
        return $this->hasMany('App\Cliente','cliente_cta_ieps_reten_por_cobrar_id');
    }
    
    public function clienteIepsRetenCobrado()
    {
        return $this->hasMany('App\Cliente','cliente_cta_ieps_reten_cobrado_id');
    }
    

    //Relaciones con tipo de proveedor

    public function tipoProveedorEgresos()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_egreso_id');
    }

    public function tipoProveedorDescuentos()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_desc_id');
    }

    public function tipoProveedorIvaAcredXCobrar()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_iva_acredit_x_cob_id');
    }

    public function tipoProveedorIvaAcredCobrado()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_iva_acredit_cob_id');
    }

    public function tipoProveedorIvaRetenXCobrar()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_iva_reten_x_cob_id');
    }

    public function tipoProveedorIvaRetenCobrado()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_iva_reten_cob_id');
    }

    public function tipoProveedorIsrRetenXCobrar()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_isr_reten_id');
    }

    public function tipoProveedorIsrRetenCobrado()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_isr_reten_cob_id');
    }

    public function tipoProveedorCuentaXPagar()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_por_pagar_id');
    }

    public function tipoProveedorAnticipos()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_anticp_prov_id');
    }

    public function tipoProveedorIepsTrasladXCobrar()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_ieps_por_cobrar_id');
    }
    
    public function tipoProveedorIepsTrasladCobrado()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_ieps_cobrado_id');
    }

    public function tipoProveedorIepsRetenXCobrar()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_ieps_reten_por_cobrar_id');
    }
    
    public function tipoProveedorIepsRetenCobrado()
    {
        return $this->hasMany('App\TipoProveedor','tipprov_cta_ieps_reten_cobrado_id');
    }



    //Relaciones con proveedor

    public function proveedorEgresos()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_egreso_id');
    }

    public function proveedorDescuentos()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_desc_id');
    }

    public function proveedorIvaAcredXCobrar()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_iva_acredit_x_cob_id');
    }

    public function proveedorIvaAcredCobrado()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_iva_acredit_cob_id');
    }

    public function proveedorIvaRetenXCobrar()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_iva_reten_x_cob_id');
    }

    public function proveedorIvaRetenCobrado()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_iva_reten_cob_id');
    }

    public function proveedorIsrRetenXCobrar()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_isr_reten_id');
    }

    public function proveedorIsrRetenCobrado()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_isr_reten_cob_id');
    }

    public function proveedorCuentaXPagar()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_por_pagar_id');
    }

    public function proveedorAnticipos()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_anticp_prov_id');
    }

    public function proveedorIepsTrasladXCobrar()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_ieps_por_cobrar_id');
    }
    
    public function proveedorIepsTrasladCobrado()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_ieps_cobrado_id');
    }

    public function proveedorIepsRetenXCobrar()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_ieps_reten_por_cobrar_id');
    }
    
    public function proveedorIepsRetenCobrado()
    {
        return $this->hasMany('App\Proveedor','proveed_cta_ieps_reten_cobrado_id');
    }

    //Relacion con configuracion central de empresa
    public function empresaCuentaXCobDef()
    {
        return $this->hasMany('App\Empresa','emp_cuenta_x_cob_def_id');
    }

    public function empresaCuentaXPagDef()
    {
        return $this->hasMany('App\Empresa','emp_cuenta_x_pag_def_id');
    }
}
