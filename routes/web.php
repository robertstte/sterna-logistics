<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('landing');
});

Route::get('login', function () {
    return view('login');
});

Route::get('language/{lang}', [LanguageController::class, 'setLanguage']);