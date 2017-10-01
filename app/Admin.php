<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $primaryKey = "admin_id";
    protected $fillable = [
        "admin_email",
        "admin_password",
    ];
}
