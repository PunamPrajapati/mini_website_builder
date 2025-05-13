<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/{any}', function () {
    return view('login'); // The Blade template that includes Vue
})->where('any', '.*');
