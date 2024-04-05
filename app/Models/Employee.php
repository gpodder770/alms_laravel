<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'employee_id ',
        'company_location',
        'first_name',
        'last_name',
        'email',
        'password',
        'birthday',
        'gender',
        'personal_phone',
        'personal_email',
        'nid',
        'address',
        'department',
        'degree',
        'profile_pic',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
