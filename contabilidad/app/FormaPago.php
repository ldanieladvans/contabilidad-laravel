<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    protected $table = "formpago";

    protected $fillable = ['formpago_formpagosat_cod','formpago_formpagosat_nom','formpago_ctacont_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function cuenta()
    {
    	return $this->belongsTo('App\Cuenta','formpago_ctacont_id');
    }
}
