<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;
use Illuminate\Support\Facades\Auth;

class RolController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $roles_list = array();
        $roles_contador = 0;
        foreach ($roles as $rl) {
            $roles_list[$roles_contador] = ['ID'=>$rl->id,'name'=>$rl->name,'slug'=>$rl->slug,'description'=>$rl->description];
            $roles_contador ++;
        }
        return view('appviews.listaroles',['roles'=>json_encode($roles_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
        return view('appviews.crearol',['permisos'=>$permisos]);
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
        $logued_user = Auth::user();
        $this->validate($request, [
            'slug' => 'unique:roles'
        ]);
        $permisos = false;
        if(array_key_exists('permisos',$alldata)){
            $permisos = $alldata['permisos'];
            unset($alldata['permisos']);
        }
        $rol = new Role($alldata);
        $rol->save();
        if($permisos != false){
            foreach ($permisos as $perm) {
                $permobj = Permission::find($perm);
                $rol->attachPermission($permobj);
            }
        }
        $fmessage = 'Se ha creado el rol: '.$alldata['name'];
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('roles.index');
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
        $rol = Role::findOrFail($id);
        $permisos = Permission::all();
        return view('appviews.editarol',['permisos'=>$permisos,'rol'=>$rol]);
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
        $logued_user = Auth::user();
        $permisos = false;
        if(array_key_exists('permisos',$alldata)){
            $permisos = $alldata['permisos'];
            unset($alldata['permisos']);
        }
        $rol = Role::findOrFail($id);
        $rol->name = $alldata['name'];
        $rol->slug = $alldata['slug'];
        $rol->description = $alldata['description'];
        $rol->save();
        if($permisos != false){
            $rol->detachAllPermissions();
            foreach ($permisos as $perm) {
                $permobj = Permission::find($perm);
                $rol->attachPermission($permobj);
            }
        }
        $fmessage = 'Se ha actualizado el rol: '.$alldata['name'];
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('roles.index');
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
