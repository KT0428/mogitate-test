<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/register', [ProductController::class, 'create']);
Route::post('/products/register', [ProductController::class, 'store']);
Route::get('/products/search', [ProductController::class, 'search']);
Route::get('/products/detail/{product}', [ProductController::class, 'show']);
Route::get('/products/{product}/update', [ProductController::class, 'edit']);
Route::post('/products/{product}/update', [ProductController::class, 'update']);
Route::post('/products/{product}/delete', [ProductController::class, 'destroy']);