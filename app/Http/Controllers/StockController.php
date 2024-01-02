<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
// Use the Model
use App\Models\Stock;
use App\Models\User;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Stock\StoreRequest;
use App\Http\Requests\Stock\UpdateRequest;
use Illuminate\Support\Facades\Storage;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.stock.index', [
            'stocks' => Stock::orderBy('updated_at', 'desc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.stock.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = Stock::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Product created successfully!');
            return redirect()->route('stocks.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.stocks.show', [
            'stock' => Stock::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.stock.index', [
            'stock' => Stock::findOrFail($id), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $stocks = Stock::findOrFail($id);
        $validated = $request->validated();

        $update = $stocks->update($validated);

        if($update) {
            session()->flash('notif.success', 'Product updated successfully!');
            return redirect()->route('stocks.index');
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
                $stock = Stock::findOrFail($id);

                $delete = $stock->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'Product deleted successfully!');
                    return redirect()->route('stocks.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
