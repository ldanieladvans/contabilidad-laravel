<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usrc_nick', 'usrc_tel', 'usrc_activo', 'usrc_pic', 'usrc_type', 'pass_changed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bitacoras()
    {
        return $this->hasMany('App\Bitacora','bitac_user_id');
    }
}
