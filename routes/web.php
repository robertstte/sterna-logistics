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

Route::get('/', function () {
    return view('landing');
});

Route::middleware(['auth'])->group(function () {
    // Rutas de administrador
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}', [OrdersController::class, 'update'])->name('orders.update');
    Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
    Route::get('/api/countries/{country}/locations', [CountryLocationController::class, 'getLocations']);

    // Rutas de usuario normal
    Route::get('/ordersUser', [UserOrdersController::class, 'index'])->name('ordersUser.index');

    Route::get('/my-account', [MyAccountController::class, 'index'])->name('my-account');
    Route::put('/my-account/profile', [MyAccountController::class, 'updateProfile'])->name('my-account.profile');
    Route::put('/my-account/password', [MyAccountController::class, 'updatePassword'])->name('my-account.password');
    Route::put('/my-account/preferences', [MyAccountController::class, 'updatePreferences'])->name('my-account.preferences');
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

Route::get('/about-us', function () {
    return view('aboutUs');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('language/{lang}', [LanguageController::class, 'setLanguage']);