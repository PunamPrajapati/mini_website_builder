<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function() {
    return "hello";
})->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [UserController::class, 'logout']);
    Route::prefix('websites')->group(function () {
        // Get all websites
        Route::get('/', [WebsiteController::class, 'getAll'])->name('websites.getAll');
    
        // Get a specific website by ID
        Route::get('/{id}', [WebsiteController::class, 'findById'])->name('websites.findById');
    
        // Create a new website
        Route::post('/', [WebsiteController::class, 'create'])->name('websites.create');
    
        // Update an existing website
        Route::post('/{id}', [WebsiteController::class, 'update'])->name('websites.update');
    
        // Delete a website
        Route::delete('/{id}', [WebsiteController::class, 'delete'])->name('websites.delete');
    });
});