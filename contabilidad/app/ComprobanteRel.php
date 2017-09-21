<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComprobanteRel extends Model
{
    
	protected $table = "comprel";

    protected $fillable = ['comprel_tiporel_cod','comprel_tiporel_nom','comprel_comp_id','comprel_comp_rel_uuid'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }


    public function comprobante()
    {
    	return $this->belongsTo('App\Comprobante','comprel_comp_id');
    }
    
}
