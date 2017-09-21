<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ChangeBD
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $alldata = $request->all();
        $dbname = 'contabilidad';
        $cta = '';

        if(array_key_exists('login_rfc',$alldata) && array_key_exists('login_cta',$alldata)) {
            Log::info('entre desde login');
            $cta = strtoupper($alldata['login_cta']);
            $rfc = strtoupper($alldata['login_rfc']);
            $code = 'cont';
            $dbname = $cta.'_'.$rfc.'_'.$code;
            $arrayparams['cta'] = $cta;
            $arrayparams['dbname'] = $dbname;
            $cont = new Controller;

            $acces_vars = $cont->getAccessToken('cuenta');
            $service_response = $cont->getAppService($acces_vars['access_token'],'verifinst',$arrayparams,'cuenta');
            Log::info('response servive '.$service_response['status']);
            if ($service_response['status'] == 1){

                \Session::put('selected_database',$dbname);
                \Session::put('RFC',$alldata['login_rfc']);
                \Session::put('cta',$alldata['login_cta']);
                $request->session()->pull('loginrfcerr');
            }
            else
            {
                $request->session()->flash('midred', '1');
                $request->session()->put('loginrfcerr', $service_response['msg']);
                $request->session()->put('login_rfc', $dbname);
                return redirect('/');
            }
        }
        else if(\Session::has('selected_database'))
        {
            Log::info('entre desde transacción web');
            $dbname = \Session::get('selected_database');
            $cta = \Session::get('cuenta');
        }
        else if (array_key_exists('dbname',$alldata) && array_key_exists('dbname',$alldata))
        {
            Log::info('entre desde servicio');
            $dbname = $alldata['dbname'];

            \Artisan::call('config:cache');
            \Config::set('database.connections.'.$dbname, [
                            'driver' => 'mysql',
                            'host' => env('DB_HOST', '127.0.0.1'),
                            'port' => env('DB_PORT', '3306'),
                            'database' => $dbname,
                            'username' => env('DB_USERNAME', 'forge'),
                            'password' => env('DB_PASSWORD', ''),
                            'unix_socket' => env('DB_SOCKET', ''),
                            'charset' => 'utf8mb4',
                            'collation' => 'utf8mb4_unicode_ci',
                            'prefix' => '',
                            'strict' => false,
                            'engine' => null,
                        ]);
            \Artisan::call('config:clear');

        }

        \Config::set('database.default', $dbname);

       return $next($request); 
    }
}
