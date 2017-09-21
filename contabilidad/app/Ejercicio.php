<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table = "ejerc";

    protected $fillable = ['ejerc_anio','ejerc_cerrado'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function periodos()
    {
        return $this->hasMany('App\Periodo','period_ejerc_id');
    }

}
