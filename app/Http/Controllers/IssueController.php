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
use App\Http\Requests\ReceiveIssue\StoreRequest;
use App\Http\Requests\ReceiveIssue\UpdateRequest;

use App\Models\User;
use App\Models\ReceiveIssue;
use App\Models\Product;
use App\Models\Stock;
use App\Models\RecentActivity;
use App\Models\ReceiveIssueLog;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.receive_issue.index', [
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role == 'clerk') {
            $route = 'clerk.receive_issue.iform';
        } if ($role == 'admin') {
            $route = 'admin.receive_issue.iform';
        }
        $sku = Session::get('sku');
        $product = Product::where('product_sku', $sku)->first();
        $stockMovement = new ReceiveIssue();
        $smrn = $stockMovement->generateStockMovementReferenceNo();
        $currentDate = Carbon::now()->format('Y-m-d');
        Session::put('route', 'ISSUE');
        return response()->view($route, compact('currentDate', 'smrn', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $stocks = Stock::all();
        if ($stocks->isEmpty()) {
            $notif = 'No Stocks to be Issue';
            session()->flash('notif.danger', $notif);
            return redirect()->route('receives.index');
        } else {
            if (Stock::where('stock_sku', $request->input('psku'))->exists()) {
                    $stock = Stock::where('stock_sku', $request->input('psku'))->first();
                    $product = Product::where('product_sku', $request->input('psku'))->first();
                    $stock->stock_quantity = $stock->stock_quantity - $request->input('quantity');
                    $stock->total_stock_cost = number_format($stock->purchase_cost * $stock->stock_quantity, 2, '.', '');
                    $stock->total_stock_value = number_format($stock->selling_cost * $stock->stock_quantity, 2, '.', '');
                    if ($stock->stock_quantity > 0) {
                        if ($stock->stock_quantity <= $product->min_stock) {
                            $avail = 'Low Stock';
                            $stock->reorstock = 0;
                        } else {
                            $avail = 'In Stock';
                        }
                    } else {
                        $avail = 'Out of Stock';
                    }
                    $stock->availability = $avail;
                    $stock->availability_stock = $stock->availability_stock - $request->input('quantity');
                    $stock->dept = $request->input('department');
                    $stock->save();

                    $notif = 'Issue Stocks created successfully!';

            } else {
                $notif = 'No Stocks to be Issue in this SKU : ' . $request->input('psku');
                session()->flash('notif.danger', $notif);
                return redirect()->route('receives.index');
                
            }
        }

        $reis = ReceiveIssue::where('smrn', $request->input('issuesmrn'))->first();
        $reis->issuequan = $reis->quantity - $request->input('quantity');
        $reis->save();
        
        // insert only requests that already validated in the StoreRequest
        $create = ReceiveIssue::create($validated);
        $create->movement = 'ISSUED';
        $create->save();

        $rilog = ReceiveIssueLog::create($validated);
        $rilog->movement = 'ISSUED';
        $rilog->save();

        $act = new RecentActivity();
        $act->actname =  $request->input('pname');
        $act->details = $request->input('quantity');
        $act->activity = 'STOCK OUT';
        $act->save();
        
        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', $notif);
            return redirect()->route('receives.index');
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
