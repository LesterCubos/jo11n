<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\RecentActivity;
use App\Models\Stock;
use App\Models\Product;
use App\Models\ReceiveIssue;
use App\Models\Orders;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $activities = RecentActivity::latest()->take(5)->get();
        $countreorder = Stock::where('availability', 'Low Stock')->where('reorstock', 0)->count();
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
        return view('admin.dashboard', compact('activities', 'countreorder', 'countexp'));
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
}
