<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class DonerCompany extends Authenticatable
{
    protected $primaryKey = "doner_comp_id";
    protected $fillable = [
        'doner_comp_name',
        'doner_comp_phone',
        'doner_comp_owner',
        'doner_comp_manager',
        'doner_comp_email',
        'doner_comp_password',
        
    ];
}
