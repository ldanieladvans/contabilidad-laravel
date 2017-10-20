<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvisionImpuestos extends Model
{
    protected $table = "provisimp";

    protected $fillable = ['provisimp_tipo','provisimp_cod','provisimp_monto','provisimp_provis_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function provision()
    {
    	return $this->belongsTo('App\Provision','provisimp_provis_id');
    }

}
