<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeavePolicy extends Model
{
    use HasFactory;
    
    protected $table ="leave_policy";
    
    protected $fillable = [
        'company_location',
        'sick',
        'public',
        'casual',
        'special',
        'earned',
    ];
}
