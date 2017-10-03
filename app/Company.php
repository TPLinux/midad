<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    protected $table = "companies";
    protected $primaryKey = "comp_id";
    protected $fillable = [
        'comp_name',
        'comp_phone',
        'comp_owner',
        'comp_manager',
        'comp_email',
        'comp_password',
        
    ];
}
