<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\AdminController;
// Manage Users
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
// Manage Stocks
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReceiveController;
use App\Http\Controllers\IssueController;
// Manage Supplier
use App\Http\Controllers\SupplierController;

// Clerk
use App\Http\Controllers\ClerkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

require __DIR__.'/auth.php';



Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/admin/profile', [ProfileController::class, 'store'])->name('user.profile.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Manage Users
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.manage_users.index');
    Route::get('/admin/users/form', [UserController::class, 'form'])->name('admin.manage_users.form');
    // Route::get('users',UserController::class);
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('/admin/users/userView{user}', [RegisteredUserController::class, 'userView'])->name('admin.manage_users.show');
    Route::resource('user',RegisteredUserController::class);

    //Manage Stocks
    Route::get('/admin/stocks', [AdminController::class, 'Stocks'])->name('admin.stocks');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('receives', ReceiveController::class);
    Route::resource('issues', IssueController::class);
    //Manage Suppliers
    Route::resource('suppliers', SupplierController::class);

}); //End Group Admin Middleware

Route::middleware(['auth','role:clerk'])->group(function(){
    Route::get('/clerk/dashboard', [ClerkController::class, 'ClerkDashboard'])->name('clerk.dashboard');
}); //End Group Clerk Middleware
