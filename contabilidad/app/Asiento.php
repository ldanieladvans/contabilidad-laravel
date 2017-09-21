<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    protected $table = "asiento";

    protected $fillable = ['asiento_concepto','asiento_debe','asiento_haber','asiento_folio_ref','asiento_activo','asiento_ctacont_id','asiento_polz_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

   
    public function poliza()
    {
    	return $this->belongsTo('App\Poliza','asiento_polz_id');
    }

    public function cuenta()
    {
    	return $this->belongsTo('App\Cuenta','asiento_ctacont_id');
    }

     public function comprobanterel()
    {
        return $this->hasMany('App\Pagorel','pagorel_asiento_id');
    }

}
