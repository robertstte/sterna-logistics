<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/about', function () {
    return view('aboutUs');
})->name('about');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('OrderDetails', function () {
    return view('myOrder');
});

Route::get('/my-order', [MyOrderController::class, 'index'])->name('my-order');

Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::post('/orders/{order}', [OrdersController::class, 'update'])->name('orders.update');

Route::get('language/{lang}', [LanguageController::class, 'setLanguage']);
