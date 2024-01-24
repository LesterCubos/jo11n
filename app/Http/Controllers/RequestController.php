<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Requests\StoreRequest;
use App\Http\Requests\Requests\UpdateRequest;
use App\Models\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Orders;
use App\Models\RecentActivity;


class RequestController extends Controller
{
    
    public function index(): Response
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role == 'clerk') {
            $route = 'clerk.request.index';
        } if ($role == 'admin') {
            $route = 'admin.request.index';
        }
        return response()->view($route);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('clerk.request.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = Request::create($validated);
        $create->generateReqNo();
        $create->save();

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Request created successfully!');
            return redirect()->route('crequests.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $id): View
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role == 'clerk') {
            $route = 'clerk.request.show';
        } if ($role == 'admin') {
            $route = 'admin.request.form';
        }
        return view($route, ['req' => $id]);
    }

    public function edit(string $id): Response
    {
        $request = Request::findOrFail($id);
        Session::put('reqNo', $request->reqNo);

        Session::put('orroute', 'reqorder');

        return response()->view('admin.request.reqorder', [
            'req' => Request::findOrFail($id),
            'product' => Product::where('product_sku', $request->product_sku)->first(),
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'stock' => Stock::where('stock_sku', $request->product_sku)->first(),
            'currentDate' => Carbon::now()->format('Y-m-d')
        ]);
    }

    public function update(UpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $update = $request->update($validated);

        if($update) {
            session()->flash('notif.success', 'Request has been updated successfully!');
            return redirect()->route('requests.index');
        }

        return abort(500);
    }

    public function destroy(string $id): RedirectResponse
    {
        $request = Request::findOrFail($id);

        $delete = $request->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Request has been deleted successfully!');
            return redirect()->route('crequests.index');
        }

        return abort(500);
    }

}

