<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Sinergi\BrowserDetector\Browser;
use App\User;
use App\Munic;
use App\Cpmex;
use App\Bitacora;
use App\IngresosProducto;
use App\GastosProducto;
use App\ComprobanteRel;
use App\Provision;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function registeredBinnacle($request, $fname='', $fmessage='', $user_id=null, $user_name='', $controller=''){
        $user = \Auth::user();
        $split_var = explode('\Controllers',get_class($this));
        $binnacle = new Bitacora();
        $binnacle->bitac_user_id = $user_id;
        $binnacle->bitac_user = $user_name;
        $binnacle->bitac_fecha = date("Y-m-d H:i:s");
        $binnacle->bitac_tipo_op = $fname;
        $binnacle->bitac_ip = $binnacle->getrealip();
        $browser_arr = $binnacle->getBrowser();
        $binnacle->bitac_naveg = $browser_arr['name'].' '.$browser_arr['version'];
        if($controller!=''){
            $binnacle->bitac_modulo = $controller;
        }else{
            $binnacle->bitac_modulo = $split_var[1];
        }
        
        $binnacle->bitac_result = 'TODO';
        $binnacle->bitac_msg = $fmessage;
        $binnacle->bitac_dato = json_encode($request);
        $binnacle->save();
    }

    public function getAccessToken($control_app='cuenta'){

        $url_aux = config('app.advans_apps_url.'.$control_app);
        //Log::info(config('app.advans_apps_security.'.$control_app));
        //Log::info($url_aux);
        $http = new \GuzzleHttp\Client();
        $response = $http->post($url_aux.'/oauth/token', [
            'form_params' => config('app.advans_apps_security.'.$control_app),
        ]);
        

       $vartemp = json_decode((string) $response->getBody(), true);
       //Log::info($vartemp);
        return $vartemp;
    }


   public function getAppService($access_token,$app_service,$arrayparams,$control_app='cuenta'){
        $http = new \GuzzleHttp\Client();

        $query = http_build_query($arrayparams);

       $url_aux = config('app.advans_apps_url.'.$control_app);
        $array_send = [
                       'headers' => [
                                    'Authorization' => 'Bearer '.$access_token,
                                    ]
                      ];
        $response = $http->get($url_aux.'/api/'.$app_service.'?'.$query, $array_send);

       return json_decode((string) $response->getBody(), true);
    }


    public function getCpData(Request $request)
    {
        $alldata = $request->all();
        $result_response = [];
        $states_key = config('app.states_key');
        $testval = '';
        $munics = [];
        $query = Cpmex::select();
        if(array_key_exists('cp',$alldata)){
            if($alldata['cp']!=''){
                $d_codigo = "%".$alldata['cp']."%";
                $query->where('d_codigo', 'like', $d_codigo);
            }
        }
        if(array_key_exists('dommunicserv',$alldata)){
            if($alldata['dommunicserv']!=''){
                $query->where('c_mnpio', '=', $alldata['dommunicserv']);
            }
        }
        if(array_key_exists('domestadoserv',$alldata)){
            if($alldata['domestadoserv']!=''){
                $munics = Munic::where('m_state',strtoupper($alldata['domestadoserv']))->get();
                $query->where('c_estado', '=', $states_key[$alldata['domestadoserv']]);
            }
        }
        $result_response = $query->get();
        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok',
            'tabledata' => $result_response,
            'munics' => $munics,
            'alldata' => $alldata
        );
        return \Response::json($response);
    }

    public function delItems(Request $request)
    {
        $alldata = $request->all();
        $logued_user = Auth::user();
        $str_class = 'App\\';

        $records_counter = 0;

        if(array_key_exists('model',$alldata)){
            $str_class = $str_class.$alldata['model'];
        }

        if(array_key_exists('ids',$alldata)){
            if($str_class=='App\Role'){
                Role::destroy($alldata['ids']);
            }elseif ($str_class=='App\Permission') {
                Permission::destroy($alldata['ids']);
            }else{
                $str_class::destroy($alldata['ids']);
            }
            $records_counter = count($alldata['ids']);
        }

        $fmessage = 'Se han eliminado '.$records_counter. ' registros';
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'destroy', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '',$alldata['model']);
        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok'
        );
        return \Response::json($response);
    }

    public function permsbyroles(Request $request)
    {
        $rolestr = '';
        $permstr = '';
        $alldata = $request->all();
        $return_array = array();
        if(array_key_exists('selected',$alldata) && isset($alldata['selected'])){
            foreach ($alldata['selected'] as $select) {
                $role = Role::find((int)$select);
                $tests = false;
                if (isset($role)){
                    $tests = $role->permissions()->get();
                    foreach ($tests as $test) {
                        array_push($return_array, $test->id);
                        $permstr = $permstr . $test->name . ',';
                    }
                }
            }
        }

        $response = array(
            'status' => 'success',
            'msg' => 'ok',
            'roles' => $return_array,
            'alldata' => $alldata
        );
        return \Response::json($response);
    }


    public function prodIngr(Request $request)
    {
        $alldata = $request->all();
        $to_save_data = array();

        $row_id = false;
        $prodingr_cod_prod = false;
        $prodingr_tipcliente_id = false;
        $prodingr_cliente_id = false;
        $prodingr_cta_ingr_id = false;
        $data_id = false;

        if($alldata['prodingr_cod_prod']!='false'){
            $to_save_data['prodingr_cod_prod'] = $alldata['prodingr_cod_prod'];
             $prodingr_cod_prod = $alldata['prodingr_cod_prod'];
        }
        if($alldata['prodingr_tipcliente_id']!='false'){
            $to_save_data['prodingr_tipcliente_id'] = $alldata['prodingr_tipcliente_id'];
            $prodingr_tipcliente_id = $alldata['prodingr_tipcliente_id'];
        }
        if($alldata['prodingr_cliente_id']!='false'){
            $to_save_data['prodingr_cliente_id'] = $alldata['prodingr_cliente_id'];
            $prodingr_cliente_id = $alldata['prodingr_cliente_id'];
        }
        if($alldata['prodingr_cta_ingr_id']!='false'){
            $to_save_data['prodingr_cta_ingr_id'] = $alldata['prodingr_cta_ingr_id'];
            $prodingr_cta_ingr_id = $alldata['prodingr_cta_ingr_id'];
        }
        if($alldata['row_id']!='false'){
            $row_id = $alldata['row_id'];
        }

        if($alldata['crudmethod']=='create'){
            $prodingr = new IngresosProducto($to_save_data);
            $prodingr->save();
            $data_id = $prodingr->id;
        }elseif($alldata['crudmethod']=='edit'){
            if($row_id){
                $prodingr = IngresosProducto::findOrFail($row_id);
                if($prodingr_cod_prod){
                    $prodingr->prodingr_cod_prod = $prodingr_cod_prod;
                }
                if($prodingr_tipcliente_id){
                    $prodingr->prodingr_tipcliente_id = $prodingr_tipcliente_id;
                }
                if($prodingr_cliente_id){
                    $prodingr->prodingr_cliente_id = $prodingr_cliente_id;
                }
                if($prodingr_cta_ingr_id){
                    $prodingr->prodingr_cta_ingr_id = $prodingr_cta_ingr_id;
                }
                $prodingr->save();

                $data_id = $row_id;
            }

        }else{
            if($row_id){
                IngresosProducto::destroy($row_id);
            }
        }

        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok',
            'data_id' => $data_id
        );
        return \Response::json($response);
    }


    public function prodGast(Request $request)
    {
        $alldata = $request->all();
        $to_save_data = array();

        $row_id = false;
        $prodgast_cod_prod = false;
        $prodgast_tipprov_id = false;
        $prodgast_proveed_id = false;
        $prodgast_cta_gast_id = false;
        $data_id = false;

        if($alldata['prodgast_cod_prod']!='false'){
            $to_save_data['prodgast_cod_prod'] = $alldata['prodgast_cod_prod'];
             $prodgast_cod_prod = $alldata['prodgast_cod_prod'];
        }
        if($alldata['prodgast_tipprov_id']!='false'){
            $to_save_data['prodgast_tipprov_id'] = $alldata['prodgast_tipprov_id'];
            $prodgast_tipprov_id = $alldata['prodgast_tipprov_id'];
        }
        if($alldata['prodgast_proveed_id']!='false'){
            $to_save_data['prodgast_proveed_id'] = $alldata['prodgast_proveed_id'];
            $prodgast_proveed_id = $alldata['prodgast_proveed_id'];
        }
        if($alldata['prodgast_cta_gast_id']!='false'){
            $to_save_data['prodgast_cta_gast_id'] = $alldata['prodgast_cta_gast_id'];
            $prodgast_cta_gast_id = $alldata['prodgast_cta_gast_id'];
        }
        if($alldata['row_id']!='false'){
            $row_id = $alldata['row_id'];
        }

        if($alldata['crudmethod']=='create'){
            $prodgast = new GastosProducto($to_save_data);
            $prodgast->save();
            $data_id = $prodgast->id;
        }elseif($alldata['crudmethod']=='edit'){
            if($row_id){
                $prodgast = GastosProducto::findOrFail($row_id);
                if($prodgast_cod_prod){
                    $prodgast->prodgast_cod_prod = $prodgast_cod_prod;
                }
                if($prodgast_tipprov_id){
                    $prodgast->prodgast_tipprov_id = $prodgast_tipprov_id;
                }
                if($prodgast_proveed_id){
                    $prodgast->prodgast_proveed_id = $prodgast_proveed_id;
                }
                if($prodgast_cta_gast_id){
                    $prodgast->prodgast_cta_gast_id = $prodgast_cta_gast_id;
                }
                $prodgast->save();

                $data_id = $row_id;
            }

        }else{
            if($row_id){
                GastosProducto::destroy($row_id);
            }
        }

        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok',
            'data_id' => $data_id
        );
        return \Response::json($response);
    }


    public function compRel(Request $request)
    {
        $alldata = $request->all();
        $to_save_data = array();

        $row_id = false;
        $comprel_tiporel_cod = false;
        $comprel_tiporel_nom = false;
        $comprel_comp_rel_uuid = false;
        $comprel_comp_id = false;
        $data_id = false;

        if($alldata['comprel_tiporel_cod']!='false'){
            $to_save_data['comprel_tiporel_cod'] = $alldata['comprel_tiporel_cod'];
             $comprel_tiporel_cod = $alldata['comprel_tiporel_cod'];
        }
        if($alldata['comprel_tiporel_nom']!='false'){
            $to_save_data['comprel_tiporel_nom'] = $alldata['comprel_tiporel_nom'];
            $comprel_tiporel_nom = $alldata['comprel_tiporel_nom'];
        }
        if($alldata['comprel_comp_rel_uuid']!='false'){
            $to_save_data['comprel_comp_rel_uuid'] = $alldata['comprel_comp_rel_uuid'];
            $comprel_comp_rel_uuid = $alldata['comprel_comp_rel_uuid'];
        }
        if($alldata['comprel_comp_id']!='false'){
            $to_save_data['comprel_comp_id'] = $alldata['comprel_comp_id'];
            $comprel_comp_id = $alldata['comprel_comp_id'];
        }
        if($alldata['row_id']!='false'){
            $row_id = $alldata['row_id'];
        }

        if($alldata['crudmethod']=='create'){
            $comprel = new ComprobanteRel($to_save_data);
            $comprel->save();
            $data_id = $comprel->id;
        }elseif($alldata['crudmethod']=='edit'){
            if($row_id){
                $comprel = ComprobanteRel::findOrFail($row_id);
                if($comprel_tiporel_cod){
                    $comprel->comprel_tiporel_cod = $comprel_tiporel_cod;
                }
                if($comprel_tiporel_nom){
                    $comprel->comprel_tiporel_nom = $comprel_tiporel_nom;
                }
                if($comprel_comp_rel_uuid){
                    $comprel->comprel_comp_rel_uuid = $comprel_comp_rel_uuid;
                }
                if($comprel_comp_id){
                    $comprel->comprel_comp_id = $comprel_comp_id;
                }
                $comprel->save();

                $data_id = $row_id;
            }

        }else{
            if($row_id){
                ComprobanteRel::destroy($row_id);
            }
        }

        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok',
            'data_id' => $data_id
        );
        return \Response::json($response);
    }


    public function provis(Request $request)
    {
        $alldata = $request->all();
        $to_save_data = array();

        $row_id = false;
        $provis_metpago_cod = false;
        $provis_formpago_cod = false;
        $provis_moneda_nom = false;
        $provis_moneda_cod = false;
        $provis_tipo_cambio = false;
        $provis_monto = false;
        $provis_comp_id = false;
        $data_id = false;

        if($alldata['provis_metpago_cod']!='false'){
            $to_save_data['provis_metpago_cod'] = $alldata['provis_metpago_cod'];
             $provis_metpago_cod = $alldata['provis_metpago_cod'];
        }
        if($alldata['provis_formpago_cod']!='false'){
            $to_save_data['provis_formpago_cod'] = $alldata['provis_formpago_cod'];
            $provis_formpago_cod = $alldata['provis_formpago_cod'];
        }
        if($alldata['provis_moneda_nom']!='false'){
            $to_save_data['provis_moneda_nom'] = $alldata['provis_moneda_nom'];
            $provis_moneda_nom = $alldata['provis_moneda_nom'];
        }
        if($alldata['provis_moneda_cod']!='false'){
            $to_save_data['provis_moneda_cod'] = $alldata['provis_moneda_cod'];
            $provis_moneda_cod = $alldata['provis_moneda_cod'];
        }
        if($alldata['provis_tipo_cambio']!='false'){
            $to_save_data['provis_tipo_cambio'] = $alldata['provis_tipo_cambio'];
            $provis_tipo_cambio = $alldata['provis_tipo_cambio'];
        }
        if($alldata['provis_monto']!='false'){
            $to_save_data['provis_monto'] = $alldata['provis_monto'];
            $provis_monto = $alldata['provis_monto'];
        }
        if($alldata['provis_comp_id']!='false'){
            $to_save_data['provis_comp_id'] = $alldata['provis_comp_id'];
            $provis_comp_id = $alldata['provis_comp_id'];
        }
        if($alldata['row_id']!='false'){
            $row_id = $alldata['row_id'];
        }

        if($alldata['crudmethod']=='create'){
            $provi = new Provision($to_save_data);
            $provi->save();
            $data_id = $provi->id;
        }elseif($alldata['crudmethod']=='edit'){
            if($row_id){
                $provi = Provision::findOrFail($row_id);
                if($provis_metpago_cod){
                    $provi->provis_metpago_cod = $provis_metpago_cod;
                }
                if($provis_formpago_cod){
                    $provi->provis_formpago_cod = $provis_formpago_cod;
                }
                if($provis_moneda_nom){
                    $provi->provis_moneda_nom = $provis_moneda_nom;
                }
                if($provis_moneda_cod){
                    $provi->provis_moneda_cod = $provis_moneda_cod;
                }
                if($provis_tipo_cambio){
                    $provi->provis_tipo_cambio = $provis_tipo_cambio;
                }
                if($provis_monto){
                    $provi->provis_monto = $provis_monto;
                }
                $provi->save();

                $data_id = $row_id;
            }

        }else{
            if($row_id){
                Provision::destroy($row_id);
            }
        }

        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok',
            'data_id' => $data_id
        );
        return \Response::json($response);
    }


}
