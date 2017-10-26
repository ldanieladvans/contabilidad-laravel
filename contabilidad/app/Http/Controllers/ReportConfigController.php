<?php

namespace App\Http\Controllers;
use App\ReportConfig;
use App\TipoSubCuenta;

use Illuminate\Http\Request;

class ReportConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tscuentas = TipoSubCuenta::all();
        return view('appviews.reportconfig',['tscuentas'=>$tscuentas]);
    }
}
