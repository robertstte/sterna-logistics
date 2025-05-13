<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomersController;

Route::get('/', function () {
    return view('landing');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [OrdersController::class, 'update'])->name('orders.update');
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ////////////////////busqueda de pedidos en la landing///////////////////////////
Route::get('OrderDetails', function () {
    return view('myOrder');
});
Route::get('/my-order', [MyOrderController::class, 'index'])->name('my-order');

//////////////////////////////////////////////////////////////////////////////////
Route::get('language/{lang}', [LanguageController::class, 'setLanguage']);