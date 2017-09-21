<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    protected $table = "polz";

    protected $fillable = ['polz_tipopolz','polz_fecha','polz_folio','polz_concepto','polz_importe','polz_aprobado','polz_importada','polz_activo','polz_cierre','polz_modificada','polz_period_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }

    public function pago()
    {
        return $this->hasMany('App\Pago','pago_polz_id');
    }

    public function comprobante()
    {
    	return $this->belongsTo('App\Periodo','polz_period_id');
    }

    public function asientos()
    {
        return $this->hasMany('App\Asiento','asiento_polz_id');
    }
}
