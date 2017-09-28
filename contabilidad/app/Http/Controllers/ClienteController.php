<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Direccion;
use App\Munic;
use App\Cpmex;
use App\Country;
use App\TipoCliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
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
        $clientes = Cliente::all();
        $clientes_list = array();
        $clientes_contador = 0;
        foreach ($clientes as $cl) {
            $clientes_list[$clientes_contador] = ['ID'=>$cl->id,'cliente_nom'=>$cl->cliente_nom,'cliente_rfc'=>$cl->cliente_rfc,'cliente_email'=>$cl->cliente_email,'cliente_concepto_pol'=>$cl->cliente_concepto_pol];
            $clientes_contador ++;
        }
        return view('appviews.listaclientes',['clientes'=>json_encode($clientes_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domicilios = Direccion::all();
        return view('appviews.editacliente',['domicilios'=>$domicilios,'countries'=>Country::all(),'tipocliente'=>TipoCliente::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
