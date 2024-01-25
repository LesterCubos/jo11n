<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\RecentActivity;
use App\Models\Stock;
use App\Models\Product;
use App\Models\ReceiveIssue;
use App\Models\Orders;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $user = Auth::user();
        $activities = RecentActivity::latest()->take(5)->get();
        $countreorder = Stock::where('availability', 'Low Stock')->orWhere('availability', 'Out of Stock')->where('reorstock', 0)->count();
        $countexp = 0;
        $expiries = ReceiveIssue::whereNotNull('expiry_date')->where('revstock', 0)->get();
        foreach ($expiries as $expiry) {
            if($expiry->expiry_date ) {
                $today = Carbon::now();
                $weekStartDate = $today->startOfWeek();
                $weekEndDate = $today->copy()->endOfWeek();
                // Convert the expiry_date to a Carbon instance
                $expiryDate = Carbon::parse($expiry->expiry_date);

                if ($expiryDate->gte($weekStartDate) && $expiryDate->lte($weekEndDate)) {
                    // expiry_date is within this week
                    $countexp++;
                }
            }
        }
        $tcountp = Product::all()->count();
        $risis = ReceiveIssue::where('movement', 'RECEIVED')->get();
        $tcountsi = 0;
        foreach($risis as $risi) {
            $tcountsi = $tcountsi + $risi->quantity;
        }
        $risos = ReceiveIssue::where('movement', 'ISSUED')->get();
        $tcountso = 0;
        foreach($risos as $riso) {
            $tcountso = $tcountso + $riso->quantity;
        }
        $stocks = Stock::all();
        $tcounts = 0;
        $tcountsv = 0;
        $tcountsc = 0;
        foreach ($stocks as $stock) {
            $tcounts = $tcounts + $stock->stock_quantity;
            $tcountsv = $tcountsv + $stock->total_stock_value;
            $tcountsc = $tcountsc + $stock->total_stock_cost;
        }
        $tcountls = Stock::where('availability', 'Low Stock')->count();
        $tcountos = Stock::where('availability', 'Out of Stock')->count();
        $tcountis = Stock::where('availability', 'In Stock')->count();
        return view('admin.dashboard', compact('activities', 'countreorder', 'countexp', 'user',
            'tcountp', 'tcountsi', 'tcountso', 'tcounts', 'tcountsv', 'tcountsc', 'tcountls', 'tcountos', 'tcountis'
    ));
    }

    public function Stocks()
    {
        return view('admin.stocks.index');
    }

    public function show(Stock $id): View
    {
        return view('admin.stocks.show', ['stock' => $id]);
    }

    public function Expiry()
    {
        return view('admin.expiry.index');
    }

    public function Reorder()
    {
        return view('admin.orders.reindex');
    }
    public function Reordermins()
    {
        return view('admin.orders.sminstock');
    }
    public function backups()
    {
        return view('admin.backup.index');
    }
    public function Report()
    {
        $stocks = Stock::all();
        return view('admin.report.index', compact('stocks'));
    }
}
