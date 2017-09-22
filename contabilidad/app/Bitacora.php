<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $table = "bitac";

    protected $fillable = ['bitac_fecha','bitac_modulo','bitac_ip','bitac_naveg','bitac_tipo_op','bitac_msg','bitac_result','bitac_dato','bitac_user','bitac_user_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }


    public function usuario()
    {
    	return $this->belongsTo('App\User','bitac_user_id');
    }
}
