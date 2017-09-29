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
        return view('appviews.creacliente',['domicilios'=>$domicilios,'countries'=>Country::all(),'tipocliente'=>TipoCliente::all(),'cliente_forma_contab'=>[],'cliente_cta_ingreso_id'=>[],'cliente_cta_desc_id'=>[],'cliente_cta_iva_traslad_x_cob_id'=>[],'cliente_cta_iva_traslad_cob_id'=>[],'cliente_cta_iva_reten_x_cob_id'=>[],'cliente_cta_iva_reten_cob_id'=>[],'cliente_cta_isr_reten_id'=>[],'cliente_cta_por_cobrar_id'=>[]]);
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
        if(array_key_exists('nueva_dir',$alldata)){
            $new_dir = new Direccion();
            $new_dir->direc_calle = array_key_exists('dom_calle',$alldata) ? $alldata['dom_calle'] : '';
            $new_dir->direc_num_ext = array_key_exists('dom_numext',$alldata) ? $alldata['dom_numext'] : '';
            $new_dir->direc_num_int = array_key_exists('dom_numint',$alldata) ? $alldata['dom_numint'] : '';
            $new_dir->direc_colonia = array_key_exists('dom_col',$alldata) ? $alldata['dom_col'] : '';
            $new_dir->direc_localidad = array_key_exists('dom_ciudad',$alldata) ? $alldata['dom_ciudad'] : '';
            $new_dir->direc_municipio = array_key_exists('dom_munic',$alldata) ? $alldata['dom_munic'] : '';
            $new_dir->direc_estado = array_key_exists('dom_estado',$alldata) ? $alldata['dom_estado'] : '';
            $new_dir->direc_cp = array_key_exists('dom_cp',$alldata) ? $alldata['dom_cp'] : '';
            $new_dir->direc_pais = 'MEX';
            $new_dir->save();
            $alldata['cliente_direc_id'] =  $new_dir->id;
        }
        unset($alldata['dom_search_cp']);
        unset($alldata['dom_estado_aux']);
        unset($alldata['dom_munic']);
        unset($alldata['dynamic-table_length']);
        unset($alldata['dom_cp']);
        unset($alldata['dom_estado']);
        unset($alldata['dom_ciudad']);
        unset($alldata['dom_col']);
        unset($alldata['dom_calle']);
        unset($alldata['dom_numext']);
        unset($alldata['dom_numint']);

        $client = new Cliente($alldata);
        $client->save();

        return redirect()->route('clientes.index');
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
