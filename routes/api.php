<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
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
        Route::get('/{id}', [WebsiteController::class, 'getById'])->name('websites.getById');

        // Create a new website
        Route::post('/', [WebsiteController::class, 'create'])->name('websites.create');

        // Update an existing website
        Route::put('/{id}', [WebsiteController::class, 'update'])->name('websites.update');

        // Delete a website
        Route::delete('/{id}', [WebsiteController::class, 'delete'])->name('websites.delete');
    });

    Route::prefix('sections')->group(function () {
        // Get all sections
        Route::get('/', [SectionController::class, 'getAll'])->name('sections.getAll');

        // Get a specific section by ID
        Route::get('/{id}', [SectionController::class, 'getById'])->name('sections.getById');

        // Create a new section
        Route::post('/', [SectionController::class, 'create'])->name('sections.create');

        // Update an existing section
        Route::put('/{id}', [SectionController::class, 'update'])->name('sections.update');

        // Delete a section
        Route::delete('/{id}', [SectionController::class, 'delete'])->name('sections.delete');
    });

    Route::prefix('pages')->group(function () {
        // Get all pages
        Route::get('/', [PageController::class, 'getAll'])->name('pages.getAll');

        // Get a specific page by ID
        Route::get('/{id}', [PageController::class, 'getById'])->name('pages.getById');

        // Create a new page
        Route::post('/', [PageController::class, 'create'])->name('pages.create');

        // Update an existing page
        Route::put('/{id}', [PageController::class, 'update'])->name('pages.update');

        // Delete a page
        Route::delete('/{id}', [PageController::class, 'delete'])->name('pages.delete');
    });
});
