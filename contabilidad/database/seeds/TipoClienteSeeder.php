<?php

use Illuminate\Database\Seeder;
use App\TipoCliente;
use App\Cuenta;

class TipoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_account_id = 1;
        $tcliente = new TipoCliente();

        $tipcliente_cta_ingreso_id = $default_account_id;
        $tipcliente_cta_desc_id = $default_account_id;
        $tipcliente_cta_iva_traslad_x_cob_id = $default_account_id;
        $tipcliente_cta_iva_traslad_cob_id = $default_account_id;
        $tipcliente_cta_iva_reten_x_cob_id = $default_account_id;
        $tipcliente_cta_iva_reten_cob_id = $default_account_id;
        $tipcliente_cta_isr_reten_id =$default_account_id ;
        $tipcliente_cta_por_cobrar_id = $default_account_id;
        $tipcliente_cta_anticp_client_id = $default_account_id;
        $tipcliente_cta_isr_reten_cob_id = $default_account_id;
        $tipcliente_cta_ieps_por_cobrar_id = $default_account_id;
        $tipcliente_cta_ieps_cobrado_id = $default_account_id;
        $tipcliente_cta_ieps_reten_por_cobrar_id = $default_account_id;
        $tipcliente_cta_ieps_reten_cobrado_id = $default_account_id;

        $cta_aux = Cuenta::where('ctacont_num','0000010501')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_por_cobrar_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000040101')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_ingreso_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000040201')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_desc_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000020901')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_iva_traslad_x_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000020801')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_iva_traslad_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','000002161')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_iva_reten_x_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','000002161')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_iva_reten_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000021604')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_isr_reten_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000021604')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_isr_reten_cob_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000020601')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_anticp_client_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000020902')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_ieps_por_cobrar_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000020802')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_ieps_cobrado_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000021612')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_ieps_reten_por_cobrar_id = $cta_aux[0]->id;
        }

        $cta_aux = Cuenta::where('ctacont_num','0000021612')->get();
        if(count($cta_aux) > 0){
        	$tipcliente_cta_ieps_reten_cobrado_id = $cta_aux[0]->id;
        }


        $tcliente->tipcliente_desc = 'Tipo de cliente por defecto';
        $tcliente->tipcliente_cta_ingreso_id = $tipcliente_cta_ingreso_id;
        $tcliente->tipcliente_cta_desc_id = $tipcliente_cta_desc_id;
        $tcliente->tipcliente_cta_iva_traslad_x_cob_id = $tipcliente_cta_iva_traslad_x_cob_id;
        $tcliente->tipcliente_cta_iva_traslad_cob_id = $tipcliente_cta_iva_traslad_cob_id;
        $tcliente->tipcliente_cta_iva_reten_x_cob_id = $tipcliente_cta_iva_reten_x_cob_id;
        $tcliente->tipcliente_cta_iva_reten_cob_id = $tipcliente_cta_iva_reten_cob_id;
        $tcliente->tipcliente_cta_isr_reten_id = $tipcliente_cta_isr_reten_id;
        $tcliente->tipcliente_cta_por_cobrar_id = $tipcliente_cta_por_cobrar_id;
        $tcliente->tipcliente_cta_anticp_client_id = $tipcliente_cta_anticp_client_id;
        $tcliente->tipcliente_cta_isr_reten_cob_id = $tipcliente_cta_isr_reten_cob_id;
        $tcliente->tipcliente_cta_ieps_por_cobrar_id = $tipcliente_cta_ieps_por_cobrar_id;
        $tcliente->tipcliente_cta_ieps_cobrado_id = $tipcliente_cta_ieps_cobrado_id;
        $tcliente->tipcliente_cta_ieps_reten_por_cobrar_id = $tipcliente_cta_ieps_reten_por_cobrar_id;
        $tcliente->tipcliente_cta_ieps_reten_cobrado_id = $tipcliente_cta_ieps_reten_cobrado_id;

        $tcliente->tipcliente_concpto_polz = 'Concepto';

        $tcliente->save();
    }
}
