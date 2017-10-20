<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralConfigModel extends Model
{
    protected $table = "general_config";

    protected $fillable = ['is_config'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }
}
