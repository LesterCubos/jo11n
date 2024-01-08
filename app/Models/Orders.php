<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'tron',
        'ordate',
        'orsupname',
        'orsupnumber',
        'orsku',
        'orpname',
        'orpcat',
        'orpdept',
        'orpmins',
        'orpcurs',
        'orquan',
        'orpcost',
        'ortcost',
        'orstatus',
    ];
}