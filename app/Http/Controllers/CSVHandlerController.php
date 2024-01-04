<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportStock;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class CSVHandlerController extends Controller
{
    public function Stockexport() 
    {
        return Excel::download(new ExportStock, 'stocks.xlsx');
    }

}
