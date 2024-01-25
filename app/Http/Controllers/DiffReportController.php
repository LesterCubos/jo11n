<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\ReceiveIssue;
use App\Models\Orders;

class DiffReportController extends Controller
{
    public function inventory_summary_report()
    {
        // Overall
        $stocks = ReceiveIssue::where('movement', 'RECEIVED')->get();
        // Beginning
        $totalquan = 0;
        $tempselcostb = 0;
        $totalselcost = 0;
        $totaloverallbeg = 0;
        foreach ($stocks as $stock) {
            $totalquan = $totalquan + $stock->quantity;
            $tempselcostb = $stock->quantity * $stock->selling_cost;
            $totalselcost = $totalselcost + $tempselcostb;
        }
        $totaloverallbeg = $totalselcost * $totalquan;
        // Ending
        $ris = ReceiveIssue::where('issuetype', 'Release')->get();
        $tempselcoste = 0;
        $totaloverallend = 0;
        foreach ($ris as $ri) {
            $totalquan = $totalquan - $ri->quantity;
            $tempselcoste = $ri->quantity * $ri->selling_cost;
            $totalselcost = $totalselcost - $tempselcoste;
        }
        $totaloverallend = $totalselcost * $totalquan;

        // Grocery Department
        $stocks = ReceiveIssue::where('movement', 'RECEIVED')->where('department','Grocery Department')->get();
        // Beginning
        $totalquan = 0;
        $tempselcostb = 0;
        $totalselcost = 0;
        $totaloverallbeggd = 0;
        foreach ($stocks as $stock) {
            $totalquan = $totalquan + $stock->quantity;
            $tempselcostb = $stock->quantity * $stock->selling_cost;
            $totalselcost = $totalselcost + $tempselcostb;
        }
        $totaloverallbeggd = $totalselcost * $totalquan;
        // Ending
        $ris = ReceiveIssue::where('issuetype', 'Release')->where('department','Grocery Department')->get();
        $tempselcoste = 0;
        $totaloverallendgd = 0;
        foreach ($ris as $ri) {
            $totalquan = $totalquan - $ri->quantity;
            $tempselcoste = $ri->quantity * $ri->selling_cost;
            $totalselcost = $totalselcost - $tempselcoste;
        }
        $totaloverallendgd = $totalselcost * $totalquan;
        

        // Apparel Department
        $stocks = ReceiveIssue::where('movement', 'RECEIVED')->where('department','Apparel Department')->get();
        // Beginning
        $totalquan = 0;
        $tempselcostb = 0;
        $totalselcost = 0;
        $totaloverallbegad = 0;
        foreach ($stocks as $stock) {
            $totalquan = $totalquan + $stock->quantity;
            $tempselcostb = $stock->quantity * $stock->selling_cost;
            $totalselcost = $totalselcost + $tempselcostb;
        }
        $totaloverallbegad = $totalselcost * $totalquan;
        // Ending
        $ris = ReceiveIssue::where('issuetype', 'Release')->where('department','Apparel Department')->get();
        $tempselcoste = 0;
        $totaloverallendad = 0;
        foreach ($ris as $ri) {
            $totalquan = $totalquan - $ri->quantity;
            $tempselcoste = $ri->quantity * $ri->selling_cost;
            $totalselcost = $totalselcost - $tempselcoste;
        }
        $totaloverallendad = $totalselcost * $totalquan;
        

        // Home Goods Department
        $stocks = ReceiveIssue::where('movement', 'RECEIVED')->where('department','Home Goods Department')->get();
        // Beginning
        $totalquan = 0;
        $tempselcostb = 0;
        $totalselcost = 0;
        $totaloverallbeghgd = 0;
        foreach ($stocks as $stock) {
            $totalquan = $totalquan + $stock->quantity;
            $tempselcostb = $stock->quantity * $stock->selling_cost;
            $totalselcost = $totalselcost + $tempselcostb;
        }
        $totaloverallbeghgd = $totalselcost * $totalquan;
        // Ending
        $ris = ReceiveIssue::where('issuetype', 'Release')->where('department','Home Goods Department')->get();
        $tempselcoste = 0;
        $totaloverallendhgd = 0;
        foreach ($ris as $ri) {
            $totalquan = $totalquan - $ri->quantity;
            $tempselcoste = $ri->quantity * $ri->selling_cost;
            $totalselcost = $totalselcost - $tempselcoste;
        }
        $totaloverallendhgd = $totalselcost * $totalquan;
        

        return view('admin.report.insumrep', compact(
            'totaloverallbeg', 'totaloverallend',
            'totaloverallbeggd', 'totaloverallendgd',
            'totaloverallbegad', 'totaloverallendad',
            'totaloverallbeghgd', 'totaloverallendhgd',
    ));
    }

    public function reorder_report() 
    {
        $stocks = Stock::all();
        $products = Product::all();
        $reorders = Orders::where('ortype', 'REORDER')->get();
        return view('admin.report.reorrep', compact(
            'stocks', 'products', 'reorders'
    ));
    } 
    public function order_report() 
    {
        $stocks = Stock::all();
        $products = Product::all();
        $orders = Orders::where('ortype', 'ORDER')->get();
        return view('admin.report.orrep', compact(
            'stocks', 'products', 'orders'
    ));
    } 
    public function issue_report() 
    {
        $is = ReceiveIssue::where('movement', 'ISSUED')->get();
        return view('admin.report.isrep', compact(
            'is'
    ));
    } 
}
