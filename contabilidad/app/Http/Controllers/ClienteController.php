<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Direccion;
use App\Munic;
use App\Cpmex;
use App\Country;
use App\TipoCliente;
use App\IngresosProducto;
use App\Cuenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            $clientes_list[$clientes_contador] = ['ID'=>$cl->id,'cliente_nom'=>$cl->cliente_nom,'cliente_rfc'=>$cl->cliente_rfc,'cliente_email'=>$cl->cliente_email,'cliente_concepto_polz'=>$cl->cliente_concepto_polz];
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
        return view('appviews.creacliente',['domicilios'=>$domicilios,'countries'=>Country::all(),'tipocliente'=>TipoCliente::all(),'cliente_forma_contab'=>[],'cliente_cta_ingreso_id'=>[],'cliente_cta_desc_id'=>[],'cliente_cta_iva_traslad_x_cob_id'=>[],'cliente_cta_iva_traslad_cob_id'=>[],'cliente_cta_iva_reten_x_cob_id'=>[],'cliente_cta_iva_reten_cob_id'=>[],'cliente_cta_isr_reten_id'=>[],'cliente_cta_por_cobrar_id'=>[],'cliente_cta_anticp_client_id'=>[]]);
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

        $cliente = new Cliente($alldata);
        $cliente->save();

        $fmessage = 'Se ha creado el cliente: '.$cliente->cliente_nom;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingresos_producto = IngresosProducto::where('prodingr_cliente_id',$id)->get();
        $ingresos_producto_list = array();
        $ingresos_producto_contador = 0;



        $cuentas = array();
        $cuentas_list = array();
        $cuentas_contador = 0;
        /*$cuentas[0]=['ID'=>1,'Name'=>'Cuenta 1'];
        $cuentas[1]=['ID'=>2,'Name'=>'Cuenta 2'];*/

        $cuentas_all = Cuenta::all();

        foreach ($cuentas_all as $ca) {
            $cuentas_list[$cuentas_contador] = ['ID'=>$ca->id,'Name'=>$ca->ctacont_num];
            $cuentas_contador ++;
        }

        foreach ($ingresos_producto as $ip) {
            $ingresos_producto_list[$ingresos_producto_contador] = ['ID'=>$ip->id,'prodingr_cod_prod'=>$ip->prodingr_cod_prod,'prodingr_cta_ingr_id'=>$ip->prodingr_cta_ingr_id];
            $ingresos_producto_contador ++;
        }

        $cliente = Cliente::findOrFail($id);
        $domicilios = Direccion::all();
        return view('appviews.editacliente',['cliente'=>$cliente,'domicilios'=>$domicilios,'countries'=>Country::all(),'tipocliente'=>TipoCliente::all(),'cliente_forma_contab'=>[],'cliente_cta_ingreso_id'=>[],'cliente_cta_desc_id'=>[],'cliente_cta_iva_traslad_x_cob_id'=>[],'cliente_cta_iva_traslad_cob_id'=>[],'cliente_cta_iva_reten_x_cob_id'=>[],'cliente_cta_iva_reten_cob_id'=>[],'cliente_cta_isr_reten_id'=>[],'cliente_cta_por_cobrar_id'=>[],'cliente_cta_anticp_client_id'=>[],'ingresos_productos'=>json_encode($ingresos_producto_list),'cuentas'=>json_encode($cuentas_list)]);
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
        $cliente = Cliente::findOrFail($id);
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

        $cliente->cliente_nom = $alldata['cliente_nom'];
        $cliente->cliente_rfc = $alldata['cliente_rfc'];
        $cliente->cliente_email = $alldata['cliente_email'];
        $cliente->cliente_tel = $alldata['cliente_tel'];
        $cliente->cliente_direc_id = $alldata['cliente_direc_id'];
        $cliente->cliente_concepto_polz = $alldata['cliente_concepto_polz'];
        $cliente->cliente_forma_contab = $alldata['cliente_forma_contab'];
        $cliente->cliente_cta_ingreso_id = $alldata['cliente_cta_ingreso_id'];
        $cliente->cliente_cta_desc_id = $alldata['cliente_cta_desc_id'];
        $cliente->cliente_cta_iva_traslad_x_cob_id = $alldata['cliente_cta_iva_traslad_x_cob_id'];
        $cliente->cliente_cta_iva_traslad_cob_id = $alldata['cliente_cta_iva_traslad_cob_id'];
        $cliente->cliente_cta_iva_reten_x_cob_id = $alldata['cliente_cta_iva_reten_x_cob_id'];
        $cliente->cliente_cta_iva_reten_cob_id = $alldata['cliente_cta_iva_reten_cob_id'];
        $cliente->cliente_cta_isr_reten_id = $alldata['cliente_cta_isr_reten_id'];
        $cliente->cliente_cta_por_cobrar_id = $alldata['cliente_cta_por_cobrar_id'];
        $cliente->cliente_nom_contct = $alldata['cliente_nom_contct'];
        $cliente->cliente_tel_contct = $alldata['cliente_tel_contct'];
        $cliente->cliente_email_contct = $alldata['cliente_email_contct'];
        $cliente->cliente_nom_contct_otro = $alldata['cliente_nom_contct_otro'];
        $cliente->cliente_tel_contct_otro = $alldata['cliente_tel_contct_otro'];
        $cliente->cliente_email_contct_otro = $alldata['cliente_email_contct_otro'];

        $cliente->save();

        $fmessage = 'Se ha actualizado el cliente: '.$alldata['cliente_nom'];
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('clientes.index');
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
