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
// Order
use App\Http\Controllers\OrderController;
// Request
use App\Http\Controllers\RequestController;
// Transaction
use App\Http\Controllers\TransactionController;
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
    Route::resource('/admin/user',RegisteredUserController::class);

    //Manage Stocks
    Route::get('/admin/stocks', [AdminController::class, 'Stocks'])->name('admin.stocks');
    Route::get('/admin/stocks{id}', [AdminController::class, 'show'])->name('stocks.show');
    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/receives', ReceiveController::class);
    Route::resource('/admin/issues', IssueController::class);
    Route::get('/admin/receiveissue{id}', [ReceiveController::class, 'show'])->name('receiveissue.show');
    Route::get('/admin/Stockexport', [CSVHandlerController::class, 'Stockexport'])->name('Stockexport');
    Route::get('/admin/expiry', [AdminController::class, 'Expiry'])->name('expiry.index');
    Route::resource('/admin/removes', RemoveController::class);
    Route::get('/admin/remove{id}', [RemoveController::class, 'show'])->name('remove.show');
    //Orders
    Route::resource('/admin/orders', OrderController::class);
    Route::get('/admin/reorder', [AdminController::class, 'Reorder'])->name('reorder.index');
    Route::get('/admin/notine_reorder', [AdminController::class, 'Reordermins'])->name('noticereorder.index');
    Route::get('/admin/orders{id}', [OrderController::class, 'show'])->name('order.show');
    // Request
    Route::resource('/admin/requests', RequestController::class);
    Route::get('/admin/request{id}', [RequestController::class, 'show'])->name('request.show');
    // Transaction
    Route::resource('/admin/transactions', TransactionController::class);
    Route::get('/admin/transaction{id}', [TransactionController::class, 'show'])->name('transaction.show');
    //Manage Suppliers
    Route::resource('/admin/suppliers', SupplierController::class);

}); //End Group Admin Middleware

Route::middleware(['auth','role:clerk'])->group(function(){
    Route::get('/clerk/dashboard', [ClerkController::class, 'ClerkDashboard'])->name('clerk.dashboard');
    Route::get('/clerk/profile', [ProfileController::class, 'edit'])->name('clerk.profile.edit');
    Route::post('/clerk/profile', [ProfileController::class, 'store'])->name('clerk.user.profile.store');
    Route::patch('/clerk/profile', [ProfileController::class, 'update'])->name('clerk.profile.update');
    Route::delete('/clerk/profile', [ProfileController::class, 'destroy'])->name('clerk.profile.destroy');

    Route::get('/clerk/stocks', [ClerkController::class, 'Stocks'])->name('clerk.stocks');
    Route::get('/clerk/stocks{id}', [ClerkController::class, 'show'])->name('clerk.stocks.show');
    Route::get('/clerk/products', [ClerkController::class, 'Products'])->name('clerk.products');
    Route::get('/clerk/products{id}', [ClerkController::class, 'proshow'])->name('clerk.products.show');
    Route::resource('/clerk/creceives', ReceiveController::class);
    Route::resource('/clerk/cissues', IssueController::class);
    Route::get('/clerk/receiveissue{id}', [ReceiveController::class, 'show'])->name('creceiveissue.show');
    Route::get('/clerk/Stockexport', [CSVHandlerController::class, 'CStockexport'])->name('CStockexport');
    Route::get('/clerk/expiry', [ClerkController::class, 'Expiry'])->name('clerk.expiry.index');
    Route::resource('/clerk/cremoves', RemoveController::class);
    Route::get('/clerk/remove{id}', [RemoveController::class, 'show'])->name('clerk.remove.show');
    Route::resource('/clerk/crequests', RequestController::class);
    Route::get('/clerk/request{id}', [RequestController::class, 'show'])->name('crequest.show');

}); //End Group Clerk Middleware

