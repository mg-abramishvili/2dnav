<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('schemes','App\Http\Controllers\ApiController@schemes');

Route::get('stores','App\Http\Controllers\ApiController@stores');

Route::get('/r01routes','App\Http\Controllers\ApiController@r01routes');
Route::get('/r01route/{id}','App\Http\Controllers\ApiController@r01routeItem');

Route::get('banners','App\Http\Controllers\ApiController@banners');