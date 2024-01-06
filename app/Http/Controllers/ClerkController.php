<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stock;
use App\Models\Product;

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
    public function show(Stock $id): View
    {
        return view('clerk.stocks.show', ['stock' => $id]);
    }
    public function Products()
    {
        return view('clerk.products.index');
    }
    public function proshow(Product $id): View
    {
        return view('clerk.products.form', ['product' => $id]);
    }

}
