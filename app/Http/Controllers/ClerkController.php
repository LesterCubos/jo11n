<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClerkController extends Controller
{
    public function ClerkDashboard() 
    {
        return view("clerk.dashboard");
    }
    public function Stocks()
    {
        return view('clerk.stocks.index');
    }

}
