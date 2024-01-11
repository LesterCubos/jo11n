<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiveIssueLog extends Model
{
    protected $fillable = [
        'date',
        'smrn',
        'psku',
        'pupc',
        'pname',
        'pcategory',
        'department',
        'sname',
        'quantity',
        'purchase_cost',
        'selling_cost',
        'expiry_date',
        'notes',
        'movement',
    ];
}
