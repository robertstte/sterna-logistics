<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserOrdersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryLocationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\OrderRequestController;
use App\Http\Controllers\AdminOrderRequestController;
use App\Http\Controllers\VentasController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware(['auth'])->group(function () {
    // Rutas de administrador
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}', [OrdersController::class, 'update'])->name('orders.update');
    Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
    Route::get('/api/countries/{country}/locations', [CountryLocationController::class, 'getLocations']);
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers.index');
    
    // Rutas para solicitudes de pedidos (admin)
    Route::get('/admin/orderRequests', [AdminOrderRequestController::class, 'index'])->name('admin.orderRequests');
    Route::post('/admin/orderRequests/{id}/approve', [AdminOrderRequestController::class, 'approve'])->name('admin.orderRequests.approve');
    Route::post('/admin/orderRequests/{id}/reject', [AdminOrderRequestController::class, 'reject'])->name('admin.orderRequests.reject');

    // Ruta para el panel de ventas (admin)
    Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');

    // Rutas de usuario normal
    Route::get('/ordersUser', [UserOrdersController::class, 'index'])->name('ordersUser.index');
    
    // Rutas para solicitudes de pedidos
    Route::get('/user/orders', [OrderRequestController::class, 'index'])->name('user.orders');
    Route::get('/order/request', [OrderRequestController::class, 'create'])->name('order.request.create');
    Route::post('/order/request', [OrderRequestController::class, 'store'])->name('order.request.store');

    // Rutas para MyAccount
    Route::get('/my-account', [MyAccountController::class, 'index'])->name('my-account');
    Route::post('/my-account/profile', [MyAccountController::class, 'updateProfile'])->name('my-account.profile');
    Route::post('/my-account/password', [MyAccountController::class, 'updatePassword'])->name('my-account.password');
    Route::post('/my-account/preferences', [MyAccountController::class, 'updatePreferences'])->name('my-account.preferences');
    Route::post('/my-account/plan', [MyAccountController::class, 'updatePlan'])->name('my-account.plan');

    // Rutas de facturación
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::post('/invoices/generate', [InvoiceController::class, 'generateInvoice'])->name('invoices.generate');
    Route::post('/invoices/generate-bulk', [InvoiceController::class, 'generateBulkInvoices'])->name('invoices.generate-bulk');

    // Rutas para planes
    Route::get('/plans', [PlanController::class, 'showPlans'])->name('plans.show');
    Route::post('/plans/update', [PlanController::class, 'updatePlan'])->name('plans.update');

    // Rutas Redsys
    Route::post('/redsys/checkout', [\App\Http\Controllers\RedsysController::class, 'checkout'])->name('redsys.checkout');
    Route::post('/redsys/response', [\App\Http\Controllers\RedsysController::class, 'response'])->name('redsys.response');
    Route::get('/redsys/success', [\App\Http\Controllers\RedsysController::class, 'success'])->name('redsys.success');
    Route::get('/redsys/fail', [\App\Http\Controllers\RedsysController::class, 'fail'])->name('redsys.fail');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/countries', [CountryController::class, 'getCountries'])->name('countries.get');

Route::get('OrderDetails', function () {
    return view('myOrder');
});

Route::get('/my-order', [MyOrderController::class, 'index'])->name('my-order');
Route::get('/my-order-view', [MyOrderController::class, 'view'])->name('my-order-view');

Route::get('/about-us', function () {
    return view('aboutUs');
})->name('about');

Route::get('/recovery', function () {
    return view('passwordRecovery');
})->name('recovery');

Route::post('/password-recovery', [MyAccountController::class, 'passwordRecovery'])->name('password.recovery');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('language/{lang}', [LanguageController::class, 'setLanguage'])->name('language.change');
