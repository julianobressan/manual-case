<?php

use App\Modules\Products\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// prefix: /api/v1/products

Route::get('/', [ProductController::class, 'get'])->name('Products.get');
