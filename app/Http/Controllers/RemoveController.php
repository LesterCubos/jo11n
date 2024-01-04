<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Http\Requests\ReceiveIssue\RemoveRequest;
use App\Models\RemmoveStock;
use App\Models\Stock;
use App\Models\RecentActivity;
use App\Models\Product;


class RemoveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.expiry.revindex', [
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.expiry.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RemoveRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $stocks = Stock::all();
        if ($stocks->isEmpty()) {
            $notif = 'No Stocks to be Remove';
            session()->flash('notif.danger', $notif);
            return redirect()->route('expiry.index');
        } else {
            if (Stock::where('stock_sku', $request->input('rsku'))->exists()) {
                    $stock = Stock::where('stock_sku', $request->input('rsku'))->first();
                    $product = Product::where('product_sku', $request->input('rsku'))->first();
                    $stock->stock_quantity = $stock->stock_quantity - $request->input('rquantity');
                    $stock->total_stock_cost = number_format($stock->purchase_cost * $stock->stock_quantity, 2, '.', '');
                    $stock->total_stock_value = number_format($stock->selling_cost * $stock->stock_quantity, 2, '.', '');
                    if ($stock->stock_quantity > 0) {
                        if ($stock->stock_quantity <= $product->min_stock) {
                            $avail = 'Low Stock';
                        } else {
                            $avail = 'In Stock';
                        }
                    } else {
                        $avail = 'Out of Stock';
                    }
                    $stock->availability = $avail;
                    $stock->availability_stock = $stock->availability_stock - $request->input('rquantity');
                    $stock->save();

                    $notif = 'Expired Stock removed successfully!';

            } else {
                $notif = 'No Stocks to be Remove in this SKU : ' . $request->input('rsku');
                session()->flash('notif.danger', $notif);
                return redirect()->route('expiry.index');
                
            }
        }

        // insert only requests that already validated in the StoreRequest
        $create = RemmoveStock::create($validated);

        $act = new RecentActivity();
        $act->actname =  $request->input('rname');
        $act->details = $request->input('rquantity');
        $act->activity = 'REMOVE STOCK';
        $act->save();

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', $notif);
            return redirect()->route('expiry.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(RemmoveStock $id): View
    {
        return view('admin.expiry.revshow', ['remove' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}