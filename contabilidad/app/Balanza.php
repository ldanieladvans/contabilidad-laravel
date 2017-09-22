<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balanza extends Model
{
    protected $table = "blnza";

    protected $fillable = ['blnza_saldo_inicial','blnza_cargos','blnza_abonos','blnza_saldo_final','blnza_period_id','blnza_ctacont_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function periodo()
    {
    	return $this->belongsTo('App\Periodo','blnza_period_id');
    }

    public function cuenta()
    {
    	return $this->belongsTo('App\Cuenta','blnza_ctacont_id');
    }

}
