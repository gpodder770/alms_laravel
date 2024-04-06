<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holidays_view extends Model
{
    use HasFactory;

    protected $table = 'holidays_with_day_datediff';

    protected $fillable = [
        'date',
        'name_of_day',
        'occasion',
        'company_location',
        'days_left',
    ];
}
