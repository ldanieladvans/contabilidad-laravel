<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;

class BitsController extends Controller
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
        $bits = Bitacora::all();
        $bits_list = array();
        $bits_contador = 0;
        foreach ($bits as $bt) {
            $bits_list[$bits_contador] = ['ID'=>$bt->id,'bitac_user'=>$bt->bitac_user,'bitac_fecha'=>$bt->bitac_fecha,'bitac_tipo_op'=>$bt->bitac_tipo_op,'bitac_ip'=>$bt->bitac_ip,'bitac_naveg'=>$bt->bitac_naveg,'bitac_modulo'=>$bt->bitac_modulo,'bitac_msg'=>$bt->bitac_msg];
            $bits_contador ++;
        }
        return view('appviews.listabitacora',['bits'=>json_encode($bits_list)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
