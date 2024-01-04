<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.dashboard');
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
