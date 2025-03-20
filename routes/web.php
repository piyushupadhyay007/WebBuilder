<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommonController;
use Inertia\Inertia;

Route::get('/', [UserController::class, 'index']);

// 🧑‍💻 User Authentication
// Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // 📦 Orders & Payments
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/orders/{id}/payment', [OrderController::class, 'processPayment']);

    // 🔄 Common Routes
    Route::get('/shipments', [CommonController::class, 'getShipments'])->name('shipments.index');
    Route::patch('/shipments/{id}', [CommonController::class, 'updateShipment']);

    Route::get('/discounts', [CommonController::class, 'getDiscounts'])->name('discounts.index');
    Route::get('/taxes', [CommonController::class, 'getTaxes'])->name('taxes.index');
    Route::get('/users/{id}/addresses', [CommonController::class, 'getUserAddresses']);
});
