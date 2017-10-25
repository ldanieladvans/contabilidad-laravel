<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralConfigModel extends Model
{
    protected $table = "general_config";

    protected $fillable = ['is_config','cliente_cta_ingreso_id','cliente_cta_desc_id','cliente_cta_iva_traslad_x_cob_id','cliente_cta_iva_traslad_cob_id','cliente_cta_iva_reten_x_cob_id','cliente_cta_iva_reten_cob_id','cliente_cta_isr_reten_id','cliente_cta_por_cobrar_id','cliente_cta_anticp_client_id','cliente_cta_isr_reten_cob_id','cliente_cta_ieps_por_cobrar_id','cliente_cta_ieps_cobrado_id','cliente_cta_ieps_reten_por_cobrar_id','cliente_cta_ieps_reten_cobrado_id','proveed_cta_egreso_id','proveed_cta_desc_id','proveed_cta_iva_acredit_x_cob_id','proveed_cta_iva_acredit_cob_id','proveed_cta_iva_reten_x_cob_id','proveed_cta_iva_reten_cob_id','proveed_cta_isr_reten_id','proveed_cta_por_pagar_id','proveed_cta_anticp_prov_id','proveed_cta_isr_reten_cob_id','proveed_cta_ieps_por_cobrar_id','proveed_cta_ieps_cobrado_id','proveed_cta_ieps_reten_por_cobrar_id','proveed_cta_ieps_reten_cobrado_id','cliente_concepto','proveedor_concepto'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }
}
