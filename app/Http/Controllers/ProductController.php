<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// Use the Model
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\RecentActivity;

// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.products.index', [
            'products' => Product::orderBy('updated_at', 'desc')->paginate(5), 'categories' => Category::orderBy('updated_at', 'desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.products.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $act = new RecentActivity();
        $act->actname =  $request->input('product_name');
        $act->details = $request->input('product_category');
        $act->activity = 'CREATE';
        $act->save();

        if ($request->hasFile('product_image')) {
            // put product_image in the public storage
           $filePath = Storage::disk('public')->put('product_image/products/product_img', request()->file('product_image'));
           $validated['product_image'] = $filePath;
       }

       Session::put('product_name', $request->input('product_name'));
       Session::put('product_weight', $request->input('product_weight'));
       Session::put('product_variant', $request->input('product_variant'));
       Session::put('product_category', $request->input('product_category'));

        // insert only requests that already validated in the StoreRequest
        $create = Product::create($validated);
        $create->generateSKU();
        $create->save();

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Product created successfully!');
            return redirect()->route('products.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.products.show', [
            'product' => Product::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('admin.products.form', [
            'product' => Product::findOrFail($id), 'categories' => Category::orderBy('updated_at', 'desc')->paginate(5)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $products = Product::findOrFail($id);
        $validated = $request->validated();

        $act = new RecentActivity();
        $act->actname =  $products->product_name;
        $act->details = $products->product_category;
        $act->activity = 'UPDATE';
        $act->save();

        if ($request->hasFile('product_image')) {
            // delete product_image
            Storage::disk('public')->delete($products->product_image);

            $filePath = Storage::disk('public')->put('product_image/products/product_img', request()->file('product_image'), 'public');
            $validated['product_image'] = $filePath;
        }

        Session::put('product_name', $request->input('product_name'));
        Session::put('product_weight', $request->input('product_weight'));
        Session::put('product_variant', $request->input('product_variant'));
        Session::put('product_category', $request->input('product_category'));
        
        $update = $products->update($validated);

        $products = Product::where('id', $id)->get();
        foreach ($products as $product) {
            $product->generateSKU();
            $product->save();
        }

        if($update) {
            session()->flash('notif.success', 'Product updated successfully!');
            return redirect()->route('products.index');
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
                $product = Product::findOrFail($id);

                $act = new RecentActivity();
                $act->actname =  $product->product_name;
                $act->details = $product->product_category;
                $act->activity = 'DELETE';
                $act->save();

                $delete = $product->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'Product deleted successfully!');
                    return redirect()->route('products.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
