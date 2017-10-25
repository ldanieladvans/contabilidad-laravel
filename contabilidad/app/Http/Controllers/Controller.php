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
use App\ConfigConcepto;
use App\ConfigNomina;
use App\Cuenta;
use App\Empresa;
use App\CompProces;
use App\Asiento;
use App\Poliza;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getEmpObj(){
        $emps = Empresa::all();
        $emp_obj = false;
        if(count($emps) > 0){
            $emp_obj = $emps[0];
        }

        return $emp_obj;
    }

    public function registeredBinnacle($request, $fname='', $fmessage='', $user_id=null, $user_name='', $controller=''){
        $user = \Auth::user();
        $split_var = explode('\Controllers',get_class($this));
        $binnacle = new Bitacora();
        $binnacle->bitac_user_id = $user_id;
        $binnacle->bitac_user = $user_name;
        $binnacle->bitac_fecha = date("Y-m-d H:i:s");
        $binnacle->bitac_tipo_op = $fname;
        $binnacle->bitac_ip = $binnacle->getrealip();
        //$browser_arr = $binnacle->getBrowser();
        $binnacle->bitac_naveg = json_encode(self::getBrowser()); (string) @$_SERVER['HTTP_USER_AGENT'];
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

    public function confConc(Request $request)
    {
        $alldata = $request->all();
        $to_save_data = array();

        $row_id = false;
        $confconc_codsat = false;
        $confconc_tipoconcpto = false;
        $confconc_cta_id = false;
        $data_id = false;

        if($alldata['confconc_codsat']!='false'){
            $to_save_data['confconc_codsat'] = $alldata['confconc_codsat'];
             $confconc_codsat = $alldata['confconc_codsat'];
        }
        if($alldata['confconc_tipoconcpto']!='false'){
            $to_save_data['confconc_tipoconcpto'] = $alldata['confconc_tipoconcpto'];
            $confconc_tipoconcpto = $alldata['confconc_tipoconcpto'];
        }
        if($alldata['confconc_cta_id']!='false'){
            $to_save_data['confconc_cta_id'] = $alldata['confconc_cta_id'];
            $confconc_cta_id = $alldata['confconc_cta_id'];
        }
        if($alldata['row_id']!='false'){
            $row_id = $alldata['row_id'];
        }

        if($alldata['crudmethod']=='create'){
            $confconc = new ConfigConcepto($to_save_data);
            $confconc->save();
            $data_id = $confconc->id;
        }elseif($alldata['crudmethod']=='edit'){
            if($row_id){
                $confconc = ConfigConcepto::findOrFail($row_id);
                if($confconc_codsat){
                    $confconc->confconc_codsat = $confconc_codsat;
                }
                if($confconc_tipoconcpto){
                    $confconc->confconc_tipoconcpto = $confconc_tipoconcpto;
                }
                if($confconc_cta_id){
                    $confconc->confconc_cta_id = $confconc_cta_id;
                }
                $confconc->save();

                $data_id = $row_id;
            }

        }else{
            if($row_id){
                ConfigConcepto::destroy($row_id);
            }
        }

        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok',
            'data_id' => $data_id
        );
        return \Response::json($response);
    }


    public function unlinkFile(Request $request)
    {
        $alldata = $request->all();
        $logued_user = Auth::user();
        $target_dir = base_path().DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR;
        $full_path = $target_dir.(string)$logued_user->id.'_'.$alldata['filename'];

        $exist_file = CompProces::where('user_id',$logued_user->id)->where('filename',$alldata['filename'])->where('process',false)->get();

        if(count($exist_file) > 0){
            if (file_exists($full_path)){ 
                unlink ($full_path); 
            }
            CompProces::where('user_id',$logued_user->id)->where('filename',$alldata['filename'])->where('process',false)->delete();
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Ok'
        );
        return \Response::json($response);
    }


    private static function getBrowser($app = null)
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'direccionado';
        $platform = 'inyector';
        $version = "1.0";
        $ub = 'Aplicacion advans';
        $pattern = 'unknow';

        if ($app == null) {
            //First get the platform?
            if (preg_match('/linux/i', $u_agent)) {
                $platform = 'linux';
            } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
                $platform = 'mac';
            } elseif (preg_match('/windows|win32/i', $u_agent)) {
                $platform = 'windows';
            }

            // Next get the name of the useragent yes seperately and for good reason
            if (preg_match('/MSIE/i', $u_agent) && ! preg_match('/Opera/i', $u_agent)) {
                $bname = 'Internet Explorer';
                $ub = "MSIE";
            } elseif (preg_match('/Firefox/i', $u_agent)) {
                $bname = 'Mozilla Firefox';
                $ub = "Firefox";
            } elseif (preg_match('/Chrome/i', $u_agent)) {
                $bname = 'Google Chrome';
                $ub = "Chrome";
            } elseif (preg_match('/Safari/i', $u_agent)) {
                $bname = 'Apple Safari';
                $ub = "Safari";
            } elseif (preg_match('/Opera/i', $u_agent)) {
                $bname = 'Opera';
                $ub = "Opera";
            } elseif (preg_match('/Netscape/i', $u_agent)) {
                $bname = 'Netscape';
                $ub = "Netscape";
            } else {
                $u_agent = $u_agent;
            }

            // finally get the correct version number
            $known = ['Version', $ub, 'other'];
            $pattern = '#(?<browser>'.join('|', $known).
                ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
            if (! preg_match_all($pattern, $u_agent, $matches)) {
                // we have no matching number just continue
            }

            // see how many we have
            $i = count($matches['browser']);
            if ($i != 1) {
                //we will have two since we are not using 'other' argument yet
                //see if version is before or after the name
                if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                    $version = $matches['version'][0];
                } else {
                    $version = $matches['version'][1];
                }
            } else {
                $version = $matches['version'][0];
            }

            // check if we have a number
            if ($version == null || $version == "") {
                $version = "?";
            }
        }

        return [
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern,
        ];

    }



    public function pAsientos(Request $request)
    {
        $alldata = $request->all();
        $to_save_data = array();

        $row_id = false;
        $asiento_concepto = false;
        $asiento_debe = false;
        $asiento_haber = false;
        $asiento_folio_ref = false;
        $asiento_ctacont_id = false;
        $asiento_polz_id = false;
        $asiento_manual = true;
        $data_id = false;

        if($alldata['asiento_concepto']!='false'){
            $to_save_data['asiento_concepto'] = $alldata['asiento_concepto'];
             $asiento_concepto = $alldata['asiento_concepto'];
        }
        if($alldata['asiento_debe']!='false'){
            $to_save_data['asiento_debe'] = $alldata['asiento_debe'];
            $asiento_debe = $alldata['asiento_debe'];
        }
        if($alldata['asiento_haber']!='false'){
            $to_save_data['asiento_haber'] = $alldata['asiento_haber'];
            $asiento_haber = $alldata['asiento_haber'];
        }
        if($alldata['asiento_folio_ref']!='false'){
            $to_save_data['asiento_folio_ref'] = $alldata['asiento_folio_ref'];
            $asiento_folio_ref = $alldata['asiento_folio_ref'];
        }
        if($alldata['asiento_ctacont_id']!='false'){
            $to_save_data['asiento_ctacont_id'] = $alldata['asiento_ctacont_id'];
            $asiento_ctacont_id = $alldata['asiento_ctacont_id'];
        }
        if($alldata['asiento_polz_id']!='false'){
            $to_save_data['asiento_polz_id'] = $alldata['asiento_polz_id'];
            $asiento_polz_id = $alldata['asiento_polz_id'];
        }

        $to_save_data['asiento_manual'] = $asiento_manual;

        if($alldata['row_id']!='false'){
            $row_id = $alldata['row_id'];
        }

        if($alldata['crudmethod']=='create'){
            $asiento = new Asiento($to_save_data);
            $asiento->save();
            $data_id = $asiento->id;
        }elseif($alldata['crudmethod']=='edit'){
            if($row_id){
                $asiento = Asiento::findOrFail($row_id);
                if($asiento_concepto){
                    $asiento->asiento_concepto = $asiento_concepto;
                }
                if($asiento_debe){
                    $asiento->asiento_debe = $asiento_debe;
                }
                if($asiento_haber){
                    $asiento->asiento_haber = $asiento_haber;
                }
                if($asiento_folio_ref){
                    $asiento->asiento_folio_ref = $asiento_folio_ref;
                }
                if($asiento_ctacont_id){
                    $asiento->asiento_ctacont_id = $asiento_ctacont_id;
                }
                if($asiento_polz_id){
                    $asiento->asiento_polz_id = $asiento_polz_id;
                }
                $asiento->save();

                $data_id = $row_id;
            }

        }else{
            if($row_id){
                Asiento::destroy($row_id);
            }
        }
        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok',
            'data_id' => $data_id
        );
        return \Response::json($response);
    }



    public function aprPolzs(Request $request)
    {
        $alldata = $request->all();
        $logued_user = Auth::user();

        $records_counter = 0;

        if(array_key_exists('ids',$alldata)){
            Poliza::whereIn('id', $alldata['ids'])->update(['polz_aprobado' => true,'polz_sin_reclsif_imp' => false]);
            $records_counter = count($alldata['ids']);
        }

        $fmessage = 'Se han aprovado '.$records_counter. ' registros';
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '',$alldata['model']);
        
        $response = array(
            'status' => 'success',
            'msg' => 'Ok'
        );
        return \Response::json($response);
    }


}
