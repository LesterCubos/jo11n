<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecentActivity;

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

    public function Expiry()
    {
        return view('admin.expiry.index');
    }
}
