<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SchemeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index']);

// SCHEMES
Route::resource('/schemes', SchemeController::class);
Route::get('schemes/delete/{id}','App\Http\Controllers\SchemeController@delete');
Route::post('schemes/file/{method}','App\Http\Controllers\SchemeController@file');

// ROUTES
Route::resource('/routes', RouteController::class);

// STORES
Route::resource('/stores', StoreController::class);

// ADS
Route::resource('/ads', AdController::class);


// AUTH
Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
