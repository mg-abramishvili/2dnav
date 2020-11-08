<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SchemeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index']);

// SCHEMES
Route::resource('/schemes', SchemeController::class);
Route::get('schemes/delete/{id}','App\Http\Controllers\SchemeController@delete');
Route::post('schemes/file/{method}','App\Http\Controllers\SchemeController@file');

// ROUTES
Route::resource('/routes', RouteController::class);
Route::get('routes/delete/{id}','App\Http\Controllers\RouteController@delete');

// MARKS
Route::resource('/marks', MarkController::class);
Route::get('marks/delete/{id}','App\Http\Controllers\MarkController@delete');
Route::post('marks/file/{method}','App\Http\Controllers\MarkController@file');

// STORES
Route::resource('/stores', StoreController::class);

// TAGS
Route::resource('/tags', TagController::class);

// ADS
Route::resource('/ads', AdController::class);
Route::get('ads/delete/{id}','App\Http\Controllers\AdController@delete');
Route::post('ads/file/{method}','App\Http\Controllers\AdController@file');

// AUTH
Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
