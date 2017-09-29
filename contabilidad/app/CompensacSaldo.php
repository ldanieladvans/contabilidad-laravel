<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompensacSaldo extends Model
{
    protected $table = "compsald";

    protected $fillable = ['compsald_anio','compsald_saldoafav','compsald_remsald','compsald_nomdet_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function nominaDetalle()
    {
    	return $this->belongsTo('App\NominaDetalle','compsald_nomdet_id');
    }
}
