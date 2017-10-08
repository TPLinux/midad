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
        'u_lname',
        'u_father_name',
        'u_age',
        'u_study_year',
        'u_fav_work',
        'u_country',
        'u_city',
        'u_lang',
        'u_univ_name',
        'u_univ_sec',
        'u_study_country',
        'u_study_city',
        'u_study_class',
        'u_study_lang',
        'u_points',
        'u_status',
        'u_pic',
        'u_cover',
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
