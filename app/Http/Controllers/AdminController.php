<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\RecentActivity;
use App\Models\Stock;
use App\Models\Product;
use App\Models\ReceiveIssue;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $activities = RecentActivity::latest()->take(5)->get();
        $products = Product::all();
        $stocks = Stock::all();
        $countreorder = 0;
        foreach ($products as $product) {
            foreach ($stocks as $stock) {
                if ($product->product_sku == $stock->stock_sku) {
                    if ($stock->stock_quantity <= $product->min_stock) {
                        $countreorder++;
                    }
                }
            }
        }
        $countexp = 0;
        $expiries = ReceiveIssue::whereNotNull('expiry_date')->get();
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
