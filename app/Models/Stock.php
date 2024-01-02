<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'stock_sku',
        'stock_category',
        'product_name',
        'stock_quantity',
        'purchase_cost',
        'total_stock_cost',
        'selling_cost',
        'total_stock_value',
        'availability',
        'availability_stock',
    ];
}
