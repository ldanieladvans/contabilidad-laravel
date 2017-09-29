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

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
}
