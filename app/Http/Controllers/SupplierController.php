<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// Use the Model
use App\Models\Supplier;
use App\Models\User;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Supplier\StoreRequest;
use App\Http\Requests\Supplier\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.suppliers.index', [
            'suppliers' => Supplier::orderBy('updated_at', 'desc')->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.suppliers.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('supplier_image')) {
            // put supplier_image in the public storage
           $filePath = Storage::disk('public')->put('supplier_image/suppliers/supplier_img', request()->file('supplier_image'));
           $validated['supplier_image'] = $filePath;
       }

        // insert only requests that already validated in the StoreRequest
        $create = Supplier::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Supplier created successfully!');
            return redirect()->route('suppliers.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.suppliers.show', [
            'supplier' => Supplier::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.suppliers.form', [
            'supplier' => Supplier::findOrFail($id), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $suppliers = Supplier::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('supplier_image')) {
            // delete supplier_image
            Storage::disk('public')->delete($suppliers->supplier_image);

            $filePath = Storage::disk('public')->put('supplier_image/suppliers/supplier_img', request()->file('supplier_image'), 'public');
            $validated['supplier_image'] = $filePath;
        }

        $update = $suppliers->update($validated);

        if($update) {
            session()->flash('notif.success', 'Supplier updated successfully!');
            return redirect()->route('suppliers.index');
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
                $supplier = Supplier::findOrFail($id);

                $delete = $supplier->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'Supplier deleted successfully!');
                    return redirect()->route('suppliers.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}

