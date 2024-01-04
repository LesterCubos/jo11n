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
use App\Http\Controllers\RemoveController;
use App\Http\Controllers\CSVHandlerController;
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
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile', [ProfileController::class, 'store'])->name('admin.user.profile.store');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

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
    Route::get('/stocks{id}', [AdminController::class, 'show'])->name('stocks.show');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('receives', ReceiveController::class);
    Route::resource('issues', IssueController::class);
    Route::get('/receiveissue{id}', [ReceiveController::class, 'show'])->name('receiveissue.show');
    Route::get('Stockexport', [CSVHandlerController::class, 'Stockexport'])->name('Stockexport');
    Route::get('/admin/expiry', [AdminController::class, 'Expiry'])->name('expiry.index');
    Route::resource('removes', RemoveController::class);
    Route::get('/remove{id}', [RemoveController::class, 'show'])->name('remove.show');
    //Manage Suppliers
    Route::resource('suppliers', SupplierController::class);

}); //End Group Admin Middleware

Route::middleware(['auth','role:clerk'])->group(function(){
    Route::get('/clerk/dashboard', [ClerkController::class, 'ClerkDashboard'])->name('clerk.dashboard');
    Route::get('/clerk/profile', [ProfileController::class, 'edit'])->name('clerk.profile.edit');
    Route::post('/clerk/profile', [ProfileController::class, 'store'])->name('clerk.user.profile.store');
    Route::patch('/clerk/profile', [ProfileController::class, 'update'])->name('clerk.profile.update');
    Route::delete('/clerk/profile', [ProfileController::class, 'destroy'])->name('clerk.profile.destroy');

    Route::get('/clerk/stocks', [ClerkController::class, 'Stocks'])->name('clerk.stocks');


}); //End Group Clerk Middleware

