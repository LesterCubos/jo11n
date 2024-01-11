<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Order\StoreRequest;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Stock;
use App\Models\RecentActivity;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.orders.index', [
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        Session::put('orroute', 'order');
        $currentDate = Carbon::now()->format('Y-m-d');
        return response()->view('admin.orders.form', compact('currentDate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $orroute = Session::get('orroute');

        // insert only requests that already validated in the StoreRequest
        $create = Orders::create($validated);
        $create->generateTransNo();
        if ($orroute == 'reorder') {
            $create->ortype = 'REORDER';
            $create->reor = 1;
            if (Stock::where('stock_sku', $request->input('orsku'))->exists()) {
                $stock = Stock::where('stock_sku', $request->input('orsku'))->first();
                $stock->reorstock = 1;
                $stock->save();
            }
        } else {
            $create->ortype = 'ORDER';
        }
        $create->save();

        $act = new RecentActivity();
        $act->actname =  $request->input('orpname');
        $act->details = $request->input('orstatus');
        if ($orroute == 'reorder') {
            $act->activity = 'REORDER';
        } else {
            $act->activity = 'ORDER';
        }
        $act->save();

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'New Order Stock created successfully!');
            $orroute = Session::get('orroute');
            if ($orroute == 'reorder') {
                $route = 'noticereorder.index';
            } else {
                $route = 'orders.index';
            }
            
            return redirect()->route($route);
        }

        return abort(500);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $sku): Response
    {
        Session::put('orroute', 'reorder');
        return response()->view('admin.orders.reform', [
            'reorder' => Product::where('product_sku', $sku)->first(),
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'currentDate' => Carbon::now()->format('Y-m-d'),
            'stock' => Stock::where('stock_sku', $sku)->first()
        ]);
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
