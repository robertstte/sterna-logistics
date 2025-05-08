<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MyOrderController;

Route::get('/', function () {
    return view('landing');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

// ////////////////////busqueda de pedidos en la landing///////////////////////////
Route::get('OrderDetails', function () {
    return view('myOrder');
});
Route::get('/my-order', [MyOrderController::class, 'index'])->name('my-order');


//////////////////////////////////////////////////////////////////////////////////

Route::get('language/{lang}', [LanguageController::class, 'setLanguage']);