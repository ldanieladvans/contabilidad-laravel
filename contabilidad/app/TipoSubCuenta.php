<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSubCuenta extends Model
{
    protected $table = "tiposubcta";

    protected $fillable = ['tiposubcta_nom','tiposubcta_mostrar_tab'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function cuentas()
    {
        return $this->hasMany('App\Cuenta','ctacont_tiposubcta_id');
    }
}
