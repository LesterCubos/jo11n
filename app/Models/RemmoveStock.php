<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemmoveStock extends Model
{
    protected $fillable = [
        'rsku',
        'rsmrn',
        'rname',
        'expdate',
        'rquantity',
        'rcat',
        'rdept',
        'rnotes',
        'curdate',
    ];
}
