<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('products', ProductController::class .'@create');
Route::get('products', ProductController::class .'@index');
Route::get('products/{id}', ProductController::class .'@getProduct');

Route::put('products/{id}', ProductController::class .'@update');
Route::delete('products/{id}', ProductController::class .'@delete');

