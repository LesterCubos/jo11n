<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\RecentActivity;
use App\Models\Stock;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $activities = RecentActivity::latest()->take(5)->get();
        return view('admin.dashboard', compact('activities'));
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
}
