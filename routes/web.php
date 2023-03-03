<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index']);
Route::post('/get_products', [PagesController::class, 'getProducts'])->name('getProducts');
