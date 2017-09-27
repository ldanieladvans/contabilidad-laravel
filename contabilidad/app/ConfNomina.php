<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfNomina extends Model
{
    protected $table = "nomconf";

    protected $fillable = ['nomconf_descripcion','nomconf_codsat','nomconf_tipoconcepto','nomconf_gast_cta_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }


    public function cuentaGasto()
    {
    	return $this->belongsTo('App\Cuenta','nomconf_gast_cta_id');
    }
}
