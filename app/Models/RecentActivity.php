<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentActivity extends Model
{
    protected $fillable = [
        'actname',
        'details',
        'activity'
    ];
}
