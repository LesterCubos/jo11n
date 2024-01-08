<?php

namespace App\Exports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportCStock implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = Auth::user();
        $userdept = $user->department;
        return Stock::select
        (
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
        )
        ->where('dept', $userdept)
        ->get();
    }
    public function headings(): array
    {
        return [
            'STOCK SKU',
            'STOCK CATEGORY',
            'PRODUCT NAME',
            'STOCK QUANTITY',
            'PURCHASE COST',
            'TOTALSTOCK COST',
            'SELLING COST',
            'TOTAL STOCK VALUE',
            'AVAILABILITY',
            'AVAILABILITY STOCK',
        ];
    }
}