<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SchemeController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\Route02Controller;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\MarkImageController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index']);
Route::get('/2', [FrontController::class, 'index02']);

// SCHEMES
Route::resource('/schemes', SchemeController::class)->middleware('auth');
Route::get('schemes/delete/{id}','App\Http\Controllers\SchemeController@delete')->middleware('auth');
Route::post('schemes/file/{method}','App\Http\Controllers\SchemeController@file')->middleware('auth');

// ROUTES
Route::resource('/routes', RouteController::class)->middleware('auth');
Route::get('routes/delete/{id}','App\Http\Controllers\RouteController@delete')->middleware('auth');

// ROUTES02
Route::resource('/routes02', Route02Controller::class)->middleware('auth');
Route::get('routes02/delete/{id}','App\Http\Controllers\Route02Controller@delete')->middleware('auth');

// MARKS
Route::resource('/marks', MarkController::class)->middleware('auth');
Route::get('marks/delete/{id}','App\Http\Controllers\MarkController@delete')->middleware('auth');

// MARKIMAGES
Route::resource('/markimages', MarkImageController::class)->middleware('auth');
Route::get('markimages/delete/{id}','App\Http\Controllers\MarkImageController@delete')->middleware('auth');
Route::post('markimages/file/{method}','App\Http\Controllers\MarkImageController@file')->middleware('auth');

// STORES
Route::resource('/stores', StoreController::class)->middleware('auth')->middleware('auth');
Route::get('stores/delete/{id}','App\Http\Controllers\StoreController@delete')->middleware('auth');

// TAGS
Route::resource('/tags', TagController::class)->middleware('auth')->middleware('auth');
Route::get('tags/delete/{id}','App\Http\Controllers\TagController@delete')->middleware('auth');

// ADS
Route::resource('/ads', AdController::class);
Route::get('ads/delete/{id}','App\Http\Controllers\AdController@delete')->middleware('auth');
Route::post('ads/file/{method}','App\Http\Controllers\AdController@file')->middleware('auth');

// Setup
Route::resource('/setup', SetupController::class)->middleware('auth');

// AUTH
Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
