<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Carbon\Carbon;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\ReceiveIssue\StoreRequest;
use App\Http\Requests\ReceiveIssue\UpdateRequest;

use App\Models\User;
use App\Models\ReceiveIssue;
use App\Models\Product;
use App\Models\Stock;
use App\Models\RecentActivity;
use Illuminate\Support\Facades\Auth;

class ReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role == 'clerk') {
            $route = 'clerk.receive_issue.index';
        } if ($role == 'admin') {
            $route = 'admin.receive_issue.index';
        }
        return response()->view($route, [
            'receives' => ReceiveIssue::orderBy('updated_at', 'desc')->paginate(5)
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
            $route = 'clerk.receive_issue.rform';
        } if ($role == 'admin') {
            $route = 'admin.receive_issue.rform';
        }
        $sku = Session::get('sku');
        $product = Product::where('product_sku', $sku)->first();
        $stockMovement = new ReceiveIssue();
        $smrn = $stockMovement->generateStockMovementReferenceNo();
        $currentDate = Carbon::now()->format('Y-m-d');
        Session::put('route', 'RECEIVE');
        return response()->view($route, compact('currentDate', 'smrn', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = ReceiveIssue::create($validated);
        $create->movement = 'RECEIVED';
        $create->save();

        $stocks = Stock::all();
        if ($stocks->isEmpty()) {
            $product = Product::where('product_sku', $request->input('psku'))->first();
            if ($request->input('quantity') > 0) {
                if ($request->input('quantity') <= $product->min_stock) {
                    $avail = 'Low Stock';
                } else {
                    $avail = 'In Stock';
                }
            } else {
                $avail = 'Out of Stock';
            }
            $stock = new Stock();
            $stock->stock_sku =  $request->input('psku');
            $stock->stock_category = $request->input('pcategory');
            $stock->product_name = $request->input('pname');
            $stock->stock_quantity = $request->input('quantity');
            $stock->purchase_cost = $request->input('purchase_cost');
            $stock->total_stock_cost = number_format($request->input('purchase_cost') * $request->input('quantity'), 2, '.', '');
            $stock->selling_cost = $request->input('selling_cost');
            $stock->total_stock_value = number_format($request->input('selling_cost') * $request->input('quantity'), 2, '.', '');
            $stock->availability = $avail;
            $stock->availability_stock = $request->input('quantity');
            $stock->dept = $request->input('department');
            $stock->save();
        } else {
            if (Stock::where('stock_sku', $request->input('psku'))->exists()) {
                    $stock = Stock::where('stock_sku', $request->input('psku'))->first();
                    $product = Product::where('product_sku', $request->input('psku'))->first();
    
                    $stock->stock_quantity = $stock->stock_quantity + $request->input('quantity');
                    $stock->purchase_cost = $request->input('purchase_cost');
                    $stock->total_stock_cost = number_format($request->input('purchase_cost') * $stock->stock_quantity, 2, '.', '');
                    $stock->selling_cost = $request->input('selling_cost');
                    $stock->total_stock_value = number_format($request->input('selling_cost') * $stock->stock_quantity, 2, '.', '');
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
                    $stock->availability_stock = $stock->availability_stock + $request->input('quantity');
                    $stock->dept = $request->input('department');
                    $stock->save();

            } else {
                $product = Product::where('product_sku', $request->input('psku'))->first();
                if ($request->input('quantity') > 0) {
                    if ($request->input('quantity') <= $product->min_stock) {
                        $avail = 'Low Stock';
                    } else {
                        $avail = 'In Stock';
                    }
                } else {
                    $avail = 'Out of Stock';
                }
                $createstock = Stock::create([
                    'stock_sku' =>  $request->input('psku'),
                    'stock_category' => $request->input('pcategory'),
                    'product_name' => $request->input('pname'),
                    'stock_quantity' => $request->input('quantity'),
                    'purchase_cost' =>  $request->input('purchase_cost'),
                    'total_stock_cost' => number_format( $request->input('purchase_cost') * $request->input('quantity'), 2, '.', ''),
                    'selling_cost' => $request->input('selling_cost'),
                    'total_stock_value' => number_format($request->input('selling_cost') * $request->input('quantity'), 2, '.', ''),
                    'availability' => $avail,
                    'availability_stock' => $request->input('quantity'),
                    'dept' => $request->input('department'),
                ]);
                $createstock->save();
            }
            
        }

        $act = new RecentActivity();
        $act->actname =  $request->input('pname');
        $act->details = $request->input('quantity');
        $act->activity = 'STOCK IN';
        $act->save();
        
        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Receive Stocks created successfully!');
            return redirect()->route('receives.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(ReceiveIssue $id): View
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role == 'clerk') {
            $route = 'clerk.receive_issue.rishow';
        } if ($role == 'admin') {
            $route = 'admin.receive_issue.rishow';
        }
        return view($route, ['ri' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.expiry.form', [
            'receive' => ReceiveIssue::findOrFail($id), 'currentDate' => Carbon::now()->format('Y-m-d'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $receives = ReceiveIssue::findOrFail($id);
        $validated = $request->validated();

        $update = $receives->update($validated);

        if($update) {
            session()->flash('notif.success', 'ReceiveIssue updated successfully!');
            return redirect()->route('receives.index');
        }

        return abort(500);
    }

    public function destroy(Request $request, string $id)
    {
        // Retrieve the superadmin user from the database
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            // Check if the password provided by the superadmin user is valid
            if (Hash::check($request->input('password'), $admin->password)) {
                // Proceed with the deletion of the user
                $receive = ReceiveIssue::findOrFail($id);

                $delete = $receive->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'Receive Stock deleted successfully!');
                    return redirect()->route('receives.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
