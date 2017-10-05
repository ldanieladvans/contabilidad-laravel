<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GastosProducto extends Model
{
    protected $table = "prodgast";

    protected $fillable = ['prodgast_cod_prod','prodgast_tipprov_id','prodgast_proveed_id','prodgast_cta_gast_id','devext_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function tipoProveedor()
    {
    	return $this->belongsTo('App\TipoProveedor','prodgast_tipprov_id');
    }

    public function cuenta()
    {
    	return $this->belongsTo('App\Cuenta','prodgast_cta_gast_id');
    }

    public function Proveedor()
    {
    	return $this->belongsTo('App\Proveedor','prodgast_proveed_id');
    }
}
