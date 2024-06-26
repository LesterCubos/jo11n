<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'supplier_image',
        'supplier_name',
        'supplier_email',
        'supplier_kpn',
        'supplier_address',
        'supplier_number',
        'emergency_contact',
        'econtact_number',
    ];
}
