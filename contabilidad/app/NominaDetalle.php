<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NominaDetalle extends Model
{
     protected $table = "nomdet";

    protected $fillable = ['nomdet_tipoconc','nomdet_codsat','nomdet_clave_emp','nomdet_concpto','nomdet_imp_grav','nomdet_imp_exent','nomdet_imp','nomdet_tipo_incapac','nomdet_nom_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function nomina()
    {
    	return $this->belongsTo('App\Nomina','nomdet_nom_id');
    }

    public function compensacSaldos()
    {
        return $this->hasMany('App\CompensacSaldo','compsald_nomdet_id');
    }
}
