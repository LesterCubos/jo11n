<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = [
        'report_date',
        'reporter_name',
        'department',
        'subject',
        'details',
    ];
}
