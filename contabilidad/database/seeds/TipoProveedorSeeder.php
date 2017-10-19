<?php

use Illuminate\Database\Seeder;
use App\TipoProveedor;
use App\Cuenta;

class TipoProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_account_id = 1;
        $tproveedor = new TipoProveedor();

        $tipprov_cta_egreso_id = $default_account_id;
        $tipprov_cta_desc_id = $default_account_id;
        $tipprov_cta_iva_acredit_x_cob_id = $default_account_id;
        $tipprov_cta_iva_acredit_cob_id = $default_account_id;
        $tipprov_cta_iva_reten_x_cob_id = $default_account_id;
        $tipprov_cta_iva_reten_cob_id = $default_account_id;
        $tipprov_cta_isr_reten_id =$default_account_id ;
        $tipprov_cta_por_pagar_id = $default_account_id;
        $tipprov_cta_anticp_prov_id = $default_account_id;
        $tipprov_cta_isr_reten_cob_id = $default_account_id;
        $tipprov_cta_ieps_por_cobrar_id = $default_account_id;
        $tipprov_cta_ieps_cobrado_id = $default_account_id;
        $tipprov_cta_ieps_reten_por_cobrar_id = $default_account_id;
        $tipprov_cta_ieps_reten_cobrado_id = $default_account_id;

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_egreso_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_desc_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_iva_acredit_x_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_iva_acredit_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_iva_reten_x_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_iva_reten_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_isr_reten_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_por_pagar_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_anticp_prov_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_isr_reten_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_ieps_por_cobrar_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_ieps_cobrado_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_ieps_reten_por_cobrar_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','')->get();
        if(count($cta_aux) > 0){
        	$tipprov_cta_ieps_reten_cobrado_id = $cta_aux[0]->id;
        }

        $tproveedor->tipcliente_desc = 'Tipo de proveedor por defecto';
        $tproveedor->tipprov_cta_egreso_id = $tipprov_cta_egreso_id;
        $tproveedor->tipprov_cta_desc_id = $tipprov_cta_desc_id;
        $tproveedor->tipprov_cta_iva_acredit_x_cob_id = $tipprov_cta_iva_acredit_x_cob_id;
        $tproveedor->tipprov_cta_iva_acredit_cob_id = $tipprov_cta_iva_acredit_cob_id;
        $tproveedor->tipprov_cta_iva_reten_x_cob_id = $tipprov_cta_iva_reten_x_cob_id;
        $tproveedor->tipprov_cta_iva_reten_cob_id = $tipprov_cta_iva_reten_cob_id;
        $tproveedor->tipprov_cta_isr_reten_id = $tipprov_cta_isr_reten_id;
        $tproveedor->tipprov_cta_por_pagar_id = $tipprov_cta_por_pagar_id;
        $tproveedor->tipprov_cta_anticp_prov_id = $tipprov_cta_anticp_prov_id;
        $tproveedor->tipprov_cta_isr_reten_cob_id = $tipprov_cta_isr_reten_cob_id;
        $tproveedor->tipprov_cta_ieps_por_cobrar_id = $tipprov_cta_ieps_por_cobrar_id;
        $tproveedor->tipprov_cta_ieps_cobrado_id = $tipprov_cta_ieps_cobrado_id;
        $tproveedor->tipprov_cta_ieps_reten_por_cobrar_id = $tipprov_cta_ieps_reten_por_cobrar_id;
        $tproveedor->tipprov_cta_ieps_reten_cobrado_id = $tipprov_cta_ieps_reten_cobrado_id;

        $tproveedor->save();
    }
}
