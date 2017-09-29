<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigConcepto extends Model
{
    protected $table = "confconc";

    protected $fillable = ['confconc_codsat','confconc_tipoconcpto','confconc_cta_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function cuentaConcepto()
    {
    	return $this->belongsTo('App\Cuenta','confconc_cta_id');
    }
}
