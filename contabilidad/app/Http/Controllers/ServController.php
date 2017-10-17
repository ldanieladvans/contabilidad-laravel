<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Bican\Roles\Models\Role;
use App\User;
use App\SeedSecure;
use phpseclib\Crypt\RSA;
use phpseclib\Net\SFTP;
use Illuminate\Support\Facades\Storage; 
use BackupManager\Filesystems\SftpFilesystem;
use BackupManager\Filesystems\FilesystemProvider;
use BackupManager\Config\Config;
use BackupManager\Filesystems\Destination;

class ServController extends Controller
{
    use AuthenticatesUsers;

    public function createbd(Request $request)
    {
        
        $alldata = $request->all();
        $msg = "Base de datos creada satisfactoriamente.";
        $status = "Success";

        if(array_key_exists('rfc',$alldata) && isset($alldata['rfc']) && array_key_exists('cta',$alldata) && isset($alldata['cta'])){

            $dbname = $alldata['cta'].'_'.$alldata['rfc'].'_cont';
            $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
            $db = DB::select($query, [$dbname]);
            $dbvalue = config('database.connections');

            if(empty($db)){

                $strfile=file_get_contents(base_path() .'/config/database.php');
                $dbvalue = config('database.connections');

                if(!array_key_exists($dbname,$dbvalue)){

                    $str_to_replace = "'".$dbname."' => [
                    'driver' => 'mysql',
                    'host' => env('DB_HOST', '127.0.0.1'),
                    'port' => env('DB_PORT', '3306'),
                    'database' => '".$dbname."',
                    'username' => env('DB_USERNAME', 'forge'),
                    'password' => env('DB_PASSWORD', ''),
                    'unix_socket' => env('DB_SOCKET', ''),
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                    'prefix' => '',
                    'strict' => false,
                    'engine' => null,
                ],

               //AddDB
                ";
                    $strfile=str_replace("//AddDB", $str_to_replace, $strfile);
                    file_put_contents(base_path() .'/config/database.php', $strfile);
                }


                //Pedir datos de conexión a servidor para crear base de datos
                DB::statement("create database ".$dbname);
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

                \Config::set('database.default', $dbname);
                \Artisan::call('migrate', ['--database'=>$dbname]);
                //\Artisan::call('db:seed', ['--database'=>$dbname]);

                //Creando usuario para primera conexión a contabilidad

                $email = 'test@gmail.com';
                $pass = bcrypt('test');
                $nick = 'test';
                $name = 'test';
                $id_cuenta = 1;

                if(array_key_exists('password',$alldata) && isset($alldata['password'])){
                    
                    $pass = bcrypt($alldata['password']);

                }

                if(array_key_exists('email',$alldata) && isset($alldata['email'])){
                    
                    $email = $alldata['email'];
                }

                if(array_key_exists('name',$alldata) && isset($alldata['name'])){
                    
                    $name = $alldata['name'];

                }

                if(array_key_exists('id_cuenta',$alldata) && isset($alldata['id_cuenta'])){
                    
                    $id_cuenta = $alldata['id_cuenta'];

                }

                //Insertando primer usuario de base de datos de contabilidad, enviado por cuenta
                $firstusr_id = DB::connection($dbname)->table('users')->insertGetId(['name'=>$name, 'users_cuentaid'=>$id_cuenta,'email'=>$email, 'password'=>$pass]);


                //\Config::set('database.default', \Session::get('selected_database','mysql'));
            }
            else
            {
                $msg = "Instancia de contabilidad ya generada";
                $status = "Failure";
            }

        }
        else
        {
            $msg = "RFC y/o Número de cuenta no recibido";
            $status = "Failure";
        }

             $response = array(
            'status' => $status,
            'msg' => $msg,
            'data' => $alldata);

            return \Response::json($response);

       }

       public function dropbd(Request $request)
       {

        $alldata = $request->all();
        $msg = "Base de datos no recibida";
        $status = 0;
        $dbname = ''; 

        if(array_key_exists('dbname',$alldata) && isset($alldata['dbname'])){
            $dbname = $alldata['dbname'];
            DB::statement("drop database ".$dbname);
            $msg = "Base de datos eliminada satisfactoriamente";
            $status = 1;
       }
       $response = array(
            'status' => $status,
            'msg' => $msg,
            'data' => $alldata);

        return \Response::json($response);
    }

    public function getroles(Request $request)
    {
        $alldata = $request->all();
        $msg = "Sin roles";
        $status = 0;
        $dbname = '';
        $roles = array();

        if(array_key_exists('dbname',$alldata) && isset($alldata['dbname']))
        {
            $dbname = $alldata['dbname'];

            $roles_array = DB::connection($dbname)->table('roles')->get();
            //Log::info($roles_array);

            if (count($roles_array) > 0)
            {
                foreach ($roles_array as $rol) 
                {
                    $rol = array('id'=>$rol->id,'slug'=>$rol->slug,'name'=>$rol->name);
                    array_push($roles, $rol);
                }
                $msg = "Roles retornados satisfactoriamente";
                $status = 1;
            }
       }
       $response = array(
            'status' => $status,
            'msg' => $msg,
            'roles' => $roles);
       Log::info($status);
       Log::info($roles);

        return \Response::json($response);
    }

    public function adduser(Request $request)
    {
        $alldata = $request->all();
        $msg = "Sin usuario añadido";
        $status = 0;
        $dbname = '';
        $usrs = array();
        $dbname = $alldata['dbname'];

        if(array_key_exists('usr',$alldata) && isset($alldata['usr']))
        {
            $usr = $alldata['usr'];
            $usr_id = DB::connection($dbname)->table('users')->insertGetId(['name'=>$usr['name'], 'email'=>$usr['email'], 'usrc_tel'=>$usr['users_tel'], 'users_cuentaid'=>$usr['id_cuenta'], 'created_at'=>date('Y-m-d H:i:s')]);

           if(array_key_exists('roles',$alldata) && isset($alldata['roles']))
           {
               foreach ($alldata['roles'] as $rol_id) {

                    DB::connection($dbname)->table('role_user')->insert(['user_id'=>$usr_id, 'role_id'=>$rol_id, 'created_at'=>date('Y-m-d H:i:s')]);

                    $perm_array = DB::connection($dbname)->select('select permission_id from permission_role where role_id = ?',[$rol_id]);

                    foreach ($perm_array as $perm) {
                        DB::connection($dbname)->insert('insert into permission_user (permission_id, user_id) values (?, ?)', [$permm->permission_id, $usr_id]);
                    }
                }
            }

        $status = 1;
        $msg = "Usuario añadido";
        }
      

       $response = array(
            'status' => $status,
            'msg' => $msg);

        return \Response::json($response);
        
    }

    public function dropuser(Request $request)
    {
        $alldata = $request->all();
        $msg = "No es posible eliminar el usuario pues tiene dependencias en contabilidad";
        $status = 0;

         if(array_key_exists('dbname',$alldata) && isset($alldata['dbname']) && array_key_exists('id_cuenta',$alldata) && isset($alldata['id_cuenta']))
         {
            $dbname = $alldata['dbname'];
            $id_cuenta = $alldata['id_cuenta'];
            $usrs = DB::connection($dbname)->select('select id from users where users_cuentaid = ?',[$id_cuenta]);
            //$usrs = User::where('users_cuentaid','=',$id_cuenta)->get();
            if (count($usrs) > 0)
            {
                $user = $usrs[0];
                $usr_id = $user->id;
                DB::connection($dbname)->table('role_user')->where('user_id', '=', $usr_id)->delete();
                DB::connection($dbname)->table('permission_user')->where('user_id', '=', $usr_id)->delete();
                DB::connection($dbname)->table('users')->where('id', '=', $usr_id)->delete();
                $msg = "Usuario eliminado satisfactoriamente";
                $status = 1;
                
            }
            else
            {
                $msg = "Usuario no encontrado en contabilidad";
            }
         }
         else
         {
            $msg = "Usuario o nombre de base de datos no recibidos";
         }

        $response = array(
            'status' => $status,
            'msg' => $msg);

        return \Response::json($response);
    }

    public function getbitc(Request $request)
    {
        $alldata = $request->all();
        $bitacora = array();
        $status = 'failure';
        $msg = 'Sin bitácora';

        if(array_key_exists('dbname',$alldata) && isset($alldata['dbname']))
        {
            $dbname = $alldata['dbname'];
            $bitacora = DB::connection($dbname)->select('select bitac_fecha, bitac_tipo_op, bitac_ip, bitac_modulo, bitac_naveg from bitac limit 20');  

            if (count($bitacora) > 0)
            {
                $status = 'success';
                $msg = 'Bitácora retornada';
            }

        }
        //$bitacora = Bitacora::latest()->take(10)->get();

        $response = array(
            'status' => $status,
            'msg' => $msg,
            'bitacora'=>$bitacora);

        return \Response::json($response);
        
    }


    public function createbackp(Request $request)
    {
        $alldata = $request->all();
        $status = 'failure';
        $msg = 'Sin backup generado';

        if(array_key_exists('dbname',$alldata) && isset($alldata['dbname']) && array_key_exists('dest',$alldata) && isset($alldata['dest']))
        {
            $dbname = $alldata['dbname'];
            $dest = $alldata['dest'];
            
            \Artisan::call('db:backup', array('--destination' => 'sftp', '--database'=> $dbname, '--destinationPath' => $dest, '--compression' => 'gzip'));
            
            $status = 'success';
            $msg = 'Backup generado';
        }

        $response = array(
            'status' => $status,
            'msg' => $msg);

        return \Response::json($response);
        
    }

    public function restorebackp(Request $request)
    
    {
    	$alldata = $request->all();
        $status = 'failure';
        $msg = 'Sin backup generado';

        if(array_key_exists('dbname',$alldata) && isset($alldata['dbname']) && array_key_exists('dest',$alldata) && isset($alldata['dest']))
        {
            $dbname = $alldata['dbname'];
            $dest = $alldata['dest'].'.gz';
            DB::statement("drop database ".$dbname);
        	DB::statement("create database ".$dbname);
            
            \Artisan::call('db:restore', array('--source' => 'sftp', '--database'=> $dbname, '--sourcePath' => $dest, '--compression' => 'gzip'));

            //$manager = require 'bootstrap.php';
			//$manager->makeRestore()->run('sftp', $dest, $dbname, 'gzip');

            $status = 'success';
            $msg = 'Respaldo ejecutado';
            Log::info($msg);
        }

        $response = array(
            'status' => $status,
            'msg' => $msg);

        return \Response::json($response);

    }


    public function loginservice(Request $request)
    {
        $alldata = $request->all();
        $dbname = $alldata['dbname'];
        $rfc = $alldata['rfc'];
        $cta = $alldata['cta'];
        $app_cod = $alldata['cod'];
        $id_usuario = $alldata['id_usuario'];
        if(isset($id_usuario) && isset($dbname)){
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
            \Session::put('selected_database',$dbname);
            $usrs = DB::connection($dbname)->select('select id from users where users_cuentaid = ?',[$id_usuario]);
            if (count($usrs) > 0){
                $seed_secure = md5(uniqid(rand(), true));
				DB::connection($dbname)->table('sec_login')->insert([
                    ['client_rfc' => $rfc, 'cta_rfc' => $cta, 'user_id' => $id_usuario, 'seed_secure' => $seed_secure]
                ]);

                $response = array(
                        'status' => 'success',
                        'msg' => $seed_secure,
                        );
            }else{
                $response = array(
                        'status' => 'failure',
                        'msg' => 'TODO'
                        );
            }
        }
        return \Response::json($response);
    }

    public function makeSecureLogin($dbname,$hashValue)
    {

        if($hashValue){
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
            $exists = DB::connection($dbname)->select('select * from sec_login where seed_secure = ?',[$hashValue]);

            if(count($exists) > 0){
                if($exists[0]->user_id){
                    $usrs = DB::connection($dbname)->select('select id, email, password from users where users_cuentaid = ?',[$exists[0]->user_id]);
                    if(count($usrs) > 0){
						\Session::put('selected_database',$dbname);
                        \Auth::loginUsingId($usrs[0]->id, true);
                    }

                }

            }

        }
        return \Redirect::to('/home');
    }

    public function moduser(Request $request)
    {
        $alldata = $request->all();
        $msg = "Usuario modificado";
        $status = "Success";
        $usrs = [];
        $dbname = '';

        if(array_key_exists('usr',$alldata) && isset($alldata['usr']) && array_key_exists('dbname',$alldata) && isset($alldata['dbname'])){

            $usrs = json_decode($alldata['usr']);
            $dbname = $alldata['dbname'];
            $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
            $db = DB::select($query, [$dbname]);

            $bitcta_tipo_op = 'update user';
            
            if(!empty($db)){

                foreach ($usrs as $usr) {

                    DB::connection($dbname)->update('update users set name = ?, email = ?, updated_at = ? where users_cuentaid = ?', [$usr->name, $usr->email, date('Y-m-d H:i:s'), $usr->users_cuentaid]);
                    
                    //$bitcta_msg = 'Usuario '.$usr->name. ' actualizado desde cuenta';
                    
                }
            }
        }

        $response = array(
        'status' => $status,
        'msg' => $msg);

        return \Response::json($response);

    }
    
}
