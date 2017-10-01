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
    protected $primaryKey = "u_id";
    protected $fillable = [
        'u_id',
        'u_fname',
        'u_sname',
        'u_tname',
        'u_points',
        'u_team',
        'u_gender',
        'u_password',
        'u_email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'u_password', 'remember_token',
    ];
}
