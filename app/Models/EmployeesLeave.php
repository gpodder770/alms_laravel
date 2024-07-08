<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesLeave extends Model
{
    use HasFactory;
    
    protected $table = "employee_leave";

    protected $fillable = [
        'employee_id',
        'leave_type',
        'start_date',
        'end_date',
        'number_of_days',
        'leave_reason',
        'status',
        'comment'
    ];
}
