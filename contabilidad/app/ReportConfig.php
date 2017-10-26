<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportConfig extends Model
{
    protected $table = "report_config";

    protected $fillable = ['report_code','report_name','report_tiposubcta_id','report_group'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
        //$this->initJournal('MXN');
    }

    public function tipoSubcuenta()
    {
    	return $this->belongsTo('App\TipoSubCuenta','report_tiposubcta_id');
    }
}
