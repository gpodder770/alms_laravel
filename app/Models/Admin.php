<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'company_location',
        'first_name',
        'last_name',
        'email',
        'password',
        'personal_phone',
        'personal_email',
        'address',
        'profile_pic',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
