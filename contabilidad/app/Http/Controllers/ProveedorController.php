<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Direccion;
use App\Munic;
use App\Cpmex;
use App\Country;
use App\TipoProveedor;
use App\GastosProducto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProveedorController extends Controller
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
        $proveedores = Proveedor::all();
        $proveedores_list = array();
        $proveedores_contador = 0;
        foreach ($proveedores as $pv) {
            $proveedores_list[$proveedores_contador] = ['ID'=>$pv->id,'proveed_nom'=>$pv->proveed_nom,'proveed_rfc'=>$pv->proveed_rfc,'proveed_email'=>$pv->proveed_email,'proveed_tel'=>$pv->proveed_tel,'proveed_concepto_polz'=>$pv->proveed_concepto_polz];
            $proveedores_contador ++;
        }
        return view('appviews.listaproveedores',['proveedores'=>json_encode($proveedores_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domicilios = Direccion::all();
        return view('appviews.creaproveedor',['domicilios'=>$domicilios,'countries'=>Country::all(),'tipoproveedor'=>TipoProveedor::all(),'proveed_forma_contab'=>[],'proveed_cta_egreso_id'=>[],'proveed_cta_desc_id'=>[],'proveed_cta_iva_acredit_x_cob_id'=>[],'proveed_cta_iva_acredit_cob_id'=>[],'proveed_cta_iva_reten_x_cob_id'=>[],'proveed_cta_iva_reten_cob_id'=>[],'proveed_cta_isr_reten_id'=>[],'proveed_cta_por_pagar_id'=>[],'proveed_cta_anticp_prov_id'=>[]]);
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
            $alldata['proveed_direc_id'] =  $new_dir->id;
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

        $proveedor = new Proveedor($alldata);
        $proveedor->save();

        $fmessage = 'Se ha creado el proveedor: '.$proveedor->proveed_nom;
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'store', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('proveedores.index');
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
        $egresos_producto = GastosProducto::where('prodgast_proveed_id',$id)->get();
        $egresos_producto_list = array();
        $egresos_producto_contador = 0;

        $cuentas = array();
        $cuentas[0]=['ID'=>1,'Name'=>'Cuenta 1'];
        $cuentas[1]=['ID'=>2,'Name'=>'Cuenta 2'];

        foreach ($egresos_producto as $ep) {
            $egresos_producto_list[$egresos_producto_contador] = ['ID'=>$ep->id,'prodgast_cod_prod'=>$ep->prodgast_cod_prod,'prodgast_cta_gast_id'=>$ep->prodgast_cta_gast_id];
            $egresos_producto_contador ++;
        }

        $proveedor = Proveedor::findOrFail($id);
        $domicilios = Direccion::all();
        return view('appviews.editaproveedor',['proveedor'=>$proveedor,'domicilios'=>$domicilios,'countries'=>Country::all(),'tipoproveedor'=>TipoProveedor::all(),'proveed_forma_contab'=>[],'proveed_cta_egreso_id'=>[],'proveed_cta_desc_id'=>[],'proveed_cta_iva_acredit_x_cob_id'=>[],'proveed_cta_iva_acredit_cob_id'=>[],'proveed_cta_iva_reten_x_cob_id'=>[],'proveed_cta_iva_reten_cob_id'=>[],'proveed_cta_isr_reten_id'=>[],'proveed_cta_por_pagar_id'=>[],'proveed_cta_anticp_prov_id'=>[],'egresos_productos'=>json_encode($egresos_producto_list),'cuentas'=>json_encode($cuentas)]);
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
        $proveedor = Proveedor::findOrFail($id);
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
            $alldata['proveed_direc_id'] =  $new_dir->id;
        }

        $proveedor->proveed_nom = $alldata['proveed_nom'];
        $proveedor->proveed_rfc = $alldata['proveed_rfc'];
        $proveedor->proveed_email = $alldata['proveed_email'];
        $proveedor->proveed_tel = $alldata['proveed_tel'];
        $proveedor->proveed_direc_id = $alldata['proveed_direc_id'];
        $proveedor->proveed_concepto_polz = $alldata['proveed_concepto_polz'];
        $proveedor->proveed_forma_contab = $alldata['proveed_forma_contab'];
        $proveedor->proveed_cta_egreso_id = $alldata['proveed_cta_egreso_id'];
        $proveedor->proveed_cta_desc_id = $alldata['proveed_cta_desc_id'];
        $proveedor->proveed_cta_iva_acredit_x_cob_id = $alldata['proveed_cta_iva_acredit_x_cob_id'];
        $proveedor->proveed_cta_iva_acredit_cob_id = $alldata['proveed_cta_iva_acredit_cob_id'];
        $proveedor->proveed_cta_iva_reten_x_cob_id = $alldata['proveed_cta_iva_reten_x_cob_id'];
        $proveedor->proveed_cta_iva_reten_cob_id = $alldata['proveed_cta_iva_reten_cob_id'];
        $proveedor->proveed_cta_isr_reten_id = $alldata['proveed_cta_isr_reten_id'];
        $proveedor->proveed_cta_por_pagar_id = $alldata['proveed_cta_por_pagar_id'];
        $proveedor->proveed_nom_contct = $alldata['proveed_nom_contct'];
        $proveedor->proveed_tel_contct = $alldata['proveed_tel_contct'];
        $proveedor->proveed_email_contct = $alldata['proveed_email_contct'];
        $proveedor->proveed_nom_contct_otro = $alldata['proveed_nom_contct_otro'];
        $proveedor->proveed_tel_contct_otro = $alldata['proveed_tel_contct_otro'];
        $proveedor->proveed_email_contct_otro = $alldata['proveed_email_contct_otro'];

        $proveedor->save();

        $fmessage = 'Se ha actualizado el proveedor: '.$alldata['proveed_nom'];
        \Session::flash('message',$fmessage);
        $this->registeredBinnacle($alldata, 'update', $fmessage, $logued_user ? $logued_user->id : '', $logued_user ? $logued_user->name : '');

        return redirect()->route('proveedores.index');
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
