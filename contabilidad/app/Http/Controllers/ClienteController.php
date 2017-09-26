<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

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
        /*$clientes[0] = ['ID'=>1,'CompanyName'=>'Super Mart of the West','Address'=>'702 SW 8th Street','City'=>'Bentonville','State'=>'Arkansas','Zipcode'=>72716,'Phone'=>'(612) 304-6073','Fax'=>'(612) 304-6074','Website'=>'http://www.nowebsitemusic.com'];
        $clientes[1] = ['ID'=>2,'CompanyName'=>'K&S Music','Address'=>'702 SW 8th Street','City'=>'Bentonville','State'=>'Arkansas','Zipcode'=>72716,'Phone'=>'(612) 304-6073','Fax'=>'(612) 304-6074','Website'=>'http://www.nowebsitemusic.com'];
        $clientes[2] = ['ID'=>3,'CompanyName'=>'Toms Club','Address'=>'702 SW 8th Street','City'=>'Bentonville','State'=>'Arkansas','Zipcode'=>72716,'Phone'=>'(612) 304-6073','Fax'=>'(612) 304-6074','Website'=>'http://www.nowebsitemusic.com'];
        $clientes[3] = ['ID'=>4,'CompanyName'=>'E-Mart','Address'=>'702 SW 8th Street','City'=>'Bentonville','State'=>'Arkansas','Zipcode'=>72716,'Phone'=>'(612) 304-6073','Fax'=>'(612) 304-6074','Website'=>'http://www.nowebsitemusic.com'];
        $clientes[4] = ['ID'=>5,'CompanyName'=>'Walters','Address'=>'702 SW 8th Street','City'=>'Bentonville','State'=>'Arkansas','Zipcode'=>72716,'Phone'=>'(612) 304-6073','Fax'=>'(612) 304-6074','Website'=>'http://www.nowebsitemusic.com'];*/
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
