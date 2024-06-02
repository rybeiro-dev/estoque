<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});



Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::post('/data_tables', 'dataTables');
});
