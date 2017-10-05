<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use Scottlaurent\Accounting\ModelTraits\AccountingJournal;

class CuentaController extends Controller
{
    use AccountingJournal;
    
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
        $cuentas = Cuenta::all();
        $cuentas_list = array();
        $cuentas_contador = 0;
        foreach ($cuentas as $ct) {
            $cuentas_list[$cuentas_contador] = ['ID'=>$ct->id,'ctacont_num'=>$ct->ctacont_num,'ctacont_desc'=>$ct->ctacont_desc,'ctacont_tipocta_nom'=>$ct->ctacont_tipocta_nom,'ctacont_natur'=>$ct->ctacont_natur,'ctacont_catsat_cod'=>$ct->ctacont_catsat_cod];
            $cuentas_contador ++;
        }
        return view('appviews.listacuentas',['cuentas'=>json_encode($cuentas_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appviews.creacuenta',['ctacont_catsat_cod'=>[],'ctacont_tipocta_cod'=>[],'ctacont_tiposubcta_id'=>[]]);
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
