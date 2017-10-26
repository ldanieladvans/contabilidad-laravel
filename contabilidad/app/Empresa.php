<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "emp";

    protected $fillable = ['emp_rfc','emp_nom','emp_form_cta','emp_cuenta_x_cob_def_id','emp_cuenta_x_pag_def_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function cuentaXCobDef()
    {
    	return $this->belongsTo('App\Cuenta','emp_cuenta_x_cob_def_id');
    }

    public function cuentaXPagDef()
    {
    	return $this->belongsTo('App\Cuenta','emp_cuenta_x_pag_def_id');
    }
}
