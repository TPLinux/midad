<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class BeneCompany extends Authenticatable
{
    protected $primaryKey = "bene_comp_id";
    protected $fillable = [
        'bene_comp_name',
        'bene_comp_phone',
        'bene_comp_owner',
        'bene_comp_manager',
        'bene_comp_email',
        'bene_comp_password',
    ];
}
