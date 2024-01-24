<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Product;
use App\Models\ReceiveIssue;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class ClerkController extends Controller
{
    public function ClerkDashboard() 
    {
        $user = Auth::user();
        $userdept = $user->department;
        $countreorder = Stock::where('dept', $userdept)->where('availability', 'Low Stock')->orWhere('availability', 'Out of Stock')->where('reorstock', 0)->count();
        $countexp = 0;
        $expiries = ReceiveIssue::whereNotNull('expiry_date')->where('department', $userdept)->where('revstock', 0)->get();
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
        $tcountp = Product::where('pdept', $userdept)->count();
        $risis = ReceiveIssue::where('movement', 'RECEIVED')->where('department', $userdept)->get();
        $tcountsi = 0;
        foreach($risis as $risi) {
            $tcountsi = $tcountsi + $risi->quantity;
        }
        $risos = ReceiveIssue::where('movement', 'ISSUED')->where('department', $userdept)->get();
        $tcountso = 0;
        foreach($risos as $riso) {
            $tcountso = $tcountso + $riso->quantity;
        }
        $stocks = Stock::where('dept', $userdept)->get();
        $tcounts = 0;
        $tcountsv = 0;
        $tcountsc = 0;
        foreach ($stocks as $stock) {
            $tcounts = $tcounts + $stock->stock_quantity;
            $tcountsv = $tcountsv + $stock->total_stock_value;
            $tcountsc = $tcountsc + $stock->total_stock_cost;
        }
        $tcountls = Stock::where('availability', 'Low Stock')->where('dept', $userdept)->count();
        $tcountos = Stock::where('availability', 'Out of Stock')->where('dept', $userdept)->count();
        $tcountis = Stock::where('availability', 'In Stock')->where('dept', $userdept)->count();
        $trp = Request::where('department', $userdept)->where('status', 'Pending')->count();
        $trc = Request::where('department', $userdept)->where('status', 'Completed')->count();
        return view('clerk.dashboard', compact( 'countreorder', 'countexp', 'user',
            'tcountp', 'tcountsi', 'tcountso', 'tcounts', 'tcountsv', 'tcountsc', 'tcountls', 'tcountos', 'tcountis' , 'trp', 'trc'
        ));
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
    public function Expiry()
    {
        return view('clerk.expiry.index');
    }

}
