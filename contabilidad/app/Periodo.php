<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = "period";

    protected $fillable = ['period_cerrado','period_de_cierre','period_ejerc_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function polizas()
    {
        return $this->hasMany('App\Poliza','polz_period_id');
    }

    public function ejercicio()
    {
    	return $this->belongsTo('App\Ejercicio','period_ejerc_id');
    }
}
