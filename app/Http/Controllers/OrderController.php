<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Order\StoreRequest;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

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
        $currentDate = Carbon::now()->format('Y-m-d');
        return response()->view('admin.orders.form', compact('currentDate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        // insert only requests that already validated in the StoreRequest
        $create = Orders::create($validated);
        $create->generateTransNo();
        $create->save();

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'New Order Stock created successfully!');
            return redirect()->route('orders.index');
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
        return response()->view('admin.orders.reform', [
            'reorder' => Product::where('product_sku', $sku)->first(),
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
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
