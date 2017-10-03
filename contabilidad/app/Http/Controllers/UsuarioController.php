<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    use RegistersUsers;
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function customvalidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function customcreate(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }


    public function customregister(Request $request, $values)
    {
        $this->customvalidator($values)->validate();
        event(new Registered($user = $this->customcreate($values)));
        $this->registered($request, $user);
        return $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        $usuarios_list = array();
        $usuarios_contador = 0;
        foreach ($usuarios as $usr) {
            $usuarios_list[$usuarios_contador] = ['ID'=>$usr->id,'name'=>$usr->name,'email'=>$usr->email];
            $usuarios_contador ++;
        }
        return view('appviews.listausuarios',['usuarios'=>json_encode($usuarios_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('slug',['app','api'])->get();
        $permisos = Permission::all();
        return view('appviews.creausuario',['roles'=>$roles,'permisos'=>$permisos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alldata = $request->all();
        
        $user = $this->customregister($request,$alldata);
        
        $file     = false;
        $usrc_type = false;
        if(array_key_exists('usrc_pic',$alldata)){
            $file     = request()->file('usrc_pic');
            $path = $request->file('usrc_pic')->storeAs('public', $user->id.'.'.$file->getClientOriginalName());
        }
        
        if($file!=false){
            $user->usrc_pic = $user->id.'.'.$file->getClientOriginalName();
        }
        if(array_key_exists('usrc_tel',$alldata) && isset($alldata['usrc_tel'])){
            $user->usrc_tel = $alldata['usrc_tel'];
        }
        if(array_key_exists('usrc_type',$alldata) && isset($alldata['usrc_type'])){
            $user->usrc_type = $alldata['usrc_type'];
            $usrc_type = $alldata['usrc_type'];
        }
        $user->save();

        if($usrc_type=='app'){
            if(array_key_exists('roles',$alldata)){
                foreach ($alldata['roles'] as $rol) {
                    $rolobj = Role::find($rol);
                    $user->attachRole($rolobj);
                }
            }
            if(array_key_exists('permisos',$alldata)){
                foreach ($alldata['permisos'] as $perm) {
                    $permobj = Permission::find($perm);
                    $user->attachPermission($permobj);
                }
            }
            $role = Role::where('slug','app')->get();
            if(count($role)>0){
                $user->attachRole($role[0]);
            }
        }else{
            $role = Role::where('slug','api')->get();
            if(count($role)>0){
                $user->attachRole($role[0]);
            }
        }


        $fmessage = 'Se ha creado el usuario: '.$alldata['name'];
        \Session::flash('message',$fmessage);

        return redirect()->route('usuarios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::whereNotIn('slug',['app','api'])->get();
        $permisos = Permission::all();
        return view('appviews.editausuario',['usuario'=>$usuario,'roles'=>$roles,'permisos'=>$permisos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alldata = $request->all();
        $file     = false;

        $user = User::findOrFail($id);

        if(array_key_exists('usrc_pic',$alldata)){
            $file     = request()->file('usrc_pic');
            $path = $request->file('usrc_pic')->storeAs(
            'public', $user->id.'.'.$file->getClientOriginalName()
        );
        }else{
            if(array_key_exists('checkpic',$alldata)){
                if($alldata['checkpic']==0 || $alldata['checkpic']=='0'){
                    $user->usrc_pic = null;
                }
            }
        }
        if($file!=false){
            $user->usrc_pic = $user->id.'.'.$file->getClientOriginalName();
        }
        if(array_key_exists('usrc_tel',$alldata) && isset($alldata['usrc_tel'])){
            $user->usrc_tel = $alldata['usrc_tel'];
        }
        if(array_key_exists('name',$alldata) && isset($alldata['name'])){
            $user->name = $alldata['name'];
        }
        if(array_key_exists('email',$alldata) && isset($alldata['email'])){
                $user->email = $alldata['email'];       
        }

        
        $user->save();

        /*echo "<pre>";
        print_r($user);die();
        echo "</pre>";*/
        
        $user->detachAllRoles();
        if(array_key_exists('roles',$alldata)){
            foreach ($alldata['roles'] as $rol) {
                $rolobj = Role::find($rol);
                $user->attachRole($rolobj);
            }
        }
        if($user->usrc_type=='app'){
            $role = Role::where('slug','app')->get();
        }else{
            $role = Role::where('slug','api')->get();
        }
        if(count($role)>0){
            $user->attachRole($role[0]);
        }
        
        $user->detachAllPermissions();
        if(array_key_exists('permisos',$alldata)){
            
            foreach ($alldata['permisos'] as $perm) {                
                $permobj = Permission::find($perm);
                $user->attachPermission($permobj);

            }
        }
        $fmessage = 'Se ha actualizado el usuario: '.$alldata['name'];
        \Session::flash('message',$fmessage);
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
