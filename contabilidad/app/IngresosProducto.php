<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngresosProducto extends Model
{
    protected $table = "prodingr";

    protected $fillable = ['prodingr_cod_prod','prodingr_tipcliente_id','prodingr_cliente_id','prodingr_cta_ingr_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function tipoCliente()
    {
    	return $this->belongsTo('App\TipoCliente','prodingr_tipcliente_id');
    }

    public function cuenta()
    {
    	return $this->belongsTo('App\Cuenta','prodingr_cta_ingr_id');
    }

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente','prodingr_cliente_id');
    }
}
