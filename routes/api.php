<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('setup','App\Http\Controllers\ApiController@setup');
Route::post('setup','App\Http\Controllers\ApiController@setup_post');

Route::get('schemes','App\Http\Controllers\ApiController@schemes');

Route::get('stores','App\Http\Controllers\ApiController@stores');
Route::get('/store/{id}','App\Http\Controllers\ApiController@storeItem');
Route::get('stores_category_filter/{title}','App\Http\Controllers\ApiController@stores_category_filter');

Route::get('tags','App\Http\Controllers\ApiController@tags');

Route::get('/routes','App\Http\Controllers\ApiController@routes');
Route::get('/route/{id}','App\Http\Controllers\ApiController@routeItem');

Route::get('banners','App\Http\Controllers\ApiController@banners');

Route::get('specials','App\Http\Controllers\ApiController@specials');

Route::get('/kiosk/{kiosk}','App\Http\Controllers\ApiController@kioskItem');