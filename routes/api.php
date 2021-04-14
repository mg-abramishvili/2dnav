<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('schemes','App\Http\Controllers\ApiController@schemes');

Route::get('banners','App\Http\Controllers\ApiController@banners');