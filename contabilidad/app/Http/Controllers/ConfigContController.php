<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompProces;
use App\Pago;
use App\Cuenta;
use App\Poliza;
use App\Comprobante;
use App\ComprobanteRel;
use App\Nomina;
use App\Provision;
use App\Cliente;
use App\Proveedor;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Lib\XML2Array;
use SoapClient;

class ConfigContController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('appviews.configcont',[]);
    }
}
