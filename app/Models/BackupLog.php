<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupLog extends Model
{
    protected $fillable = [
        'date',
        'file_name',
    ];
}
