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


}
