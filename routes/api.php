<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('setup','App\Http\Controllers\ApiController@setup');

Route::get('schemes','App\Http\Controllers\ApiController@schemes');

Route::get('stores','App\Http\Controllers\ApiController@stores');

Route::get('tags','App\Http\Controllers\ApiController@tags');

Route::get('/routes','App\Http\Controllers\ApiController@routes');
Route::get('/route/{id}','App\Http\Controllers\ApiController@routeItem');

Route::get('banners','App\Http\Controllers\ApiController@banners');