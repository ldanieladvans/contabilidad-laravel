<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompProces extends Model
{
    protected $table = "comp_proces";

    protected $fillable = ['user_id','filename','process','process_fecha','filetype'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }
}
