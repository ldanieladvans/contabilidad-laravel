<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeedSecure extends Model
{
    protected $table = "sec_login";
    protected $fillable = ['seed_secure','client_rfc','cta_rfc','user_id'];
    protected $connection = 'instance';

    /*public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->connection = \Session::get('selected_database','mysql');
    }*/
}
