<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SchemeController;
use App\Http\Controllers\R01routeController;
use App\Http\Controllers\R02routeController;
use App\Http\Controllers\R03routeController;
use App\Http\Controllers\R04routeController;
use App\Http\Controllers\R05routeController;
use App\Http\Controllers\R06routeController;
use App\Http\Controllers\R07routeController;
use App\Http\Controllers\R08routeController;
use App\Http\Controllers\R09routeController;
use App\Http\Controllers\R10routeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\MarkImageController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontR01routeController;
use App\Http\Controllers\FrontR02routeController;
use App\Http\Controllers\FrontR03routeController;
use App\Http\Controllers\FrontR04routeController;
use App\Http\Controllers\FrontR05routeController;
use App\Http\Controllers\FrontR06routeController;
use App\Http\Controllers\FrontR07routeController;
use App\Http\Controllers\FrontR08routeController;
use App\Http\Controllers\FrontR09routeController;
use App\Http\Controllers\FrontR10routeController;
use App\Http\Controllers\FrontTagController;
use App\Http\Controllers\FrontTag2Controller;
use App\Http\Controllers\FrontTag3Controller;
use App\Http\Controllers\FrontTag4Controller;
use App\Http\Controllers\FrontTag5Controller;
use App\Http\Controllers\FrontTag6Controller;
use App\Http\Controllers\FrontTag7Controller;
use App\Http\Controllers\FrontTag8Controller;
use App\Http\Controllers\FrontTag9Controller;
use App\Http\Controllers\FrontTag10Controller;
use App\Http\Controllers\FrontSearchController;

Route::get('/', [FrontController::class, 'index']);
Route::get('/2', [FrontController::class, 'index02']);
Route::get('/3', [FrontController::class, 'index03']);
Route::get('/4', [FrontController::class, 'index04']);
Route::get('/5', [FrontController::class, 'index05']);
Route::get('/6', [FrontController::class, 'index06']);
Route::get('/7', [FrontController::class, 'index07']);
Route::get('/8', [FrontController::class, 'index08']);
Route::get('/9', [FrontController::class, 'index09']);
Route::get('/10', [FrontController::class, 'index10']);

// FRONT R01ROUTES
Route::resource('/front-r01routes', FrontR01routeController::class);
// FRONT R02ROUTES
Route::resource('/front-r02routes', FrontR02routeController::class);
// FRONT R03ROUTES
Route::resource('/front-r03routes', FrontR03routeController::class);
// FRONT R04ROUTES
Route::resource('/front-r04routes', FrontR04routeController::class);
// FRONT R05ROUTES
Route::resource('/front-r05routes', FrontR05routeController::class);
// FRONT R06ROUTES
Route::resource('/front-r06routes', FrontR06routeController::class);
// FRONT R07ROUTES
Route::resource('/front-r07routes', FrontR07routeController::class);
// FRONT R08ROUTES
Route::resource('/front-r08routes', FrontR08routeController::class);
// FRONT R09ROUTES
Route::resource('/front-r09routes', FrontR09routeController::class);
// FRONT R10ROUTES
Route::resource('/front-r10routes', FrontR10routeController::class);

// FRONT TAGS
Route::resource('/front-tags', FrontTagController::class);
Route::resource('/front-tags2', FrontTag2Controller::class);
Route::resource('/front-tags3', FrontTag3Controller::class);
Route::resource('/front-tags4', FrontTag4Controller::class);
Route::resource('/front-tags5', FrontTag5Controller::class);
Route::resource('/front-tags6', FrontTag6Controller::class);
Route::resource('/front-tags7', FrontTag7Controller::class);
Route::resource('/front-tags8', FrontTag8Controller::class);
Route::resource('/front-tags9', FrontTag9Controller::class);
Route::resource('/front-tags10', FrontTag10Controller::class);

// FRONT SEARCH
Route::get('/search', [FrontSearchController::class, 'index']);
Route::get('/search2', [FrontSearchController::class, 'index2']);
Route::get('/search3', [FrontSearchController::class, 'index3']);
Route::get('/search4', [FrontSearchController::class, 'index4']);
Route::get('/search5', [FrontSearchController::class, 'index5']);
Route::get('/search6', [FrontSearchController::class, 'index6']);
Route::get('/search7', [FrontSearchController::class, 'index7']);
Route::get('/search8', [FrontSearchController::class, 'index8']);
Route::get('/search9', [FrontSearchController::class, 'index9']);
Route::get('/search10', [FrontSearchController::class, 'index10']);

// SCHEMES
Route::resource('/schemes', SchemeController::class)->middleware('auth');
Route::get('schemes/delete/{id}','App\Http\Controllers\SchemeController@delete')->middleware('auth');
Route::post('schemes/file/{method}','App\Http\Controllers\SchemeController@file')->middleware('auth');

// R01ROUTES
Route::resource('/r01routes', R01routeController::class)->middleware('auth');
Route::get('r01routes/delete/{id}','App\Http\Controllers\R01routeController@delete')->middleware('auth');
// R02ROUTES
Route::resource('/r02routes', R02routeController::class)->middleware('auth');
Route::get('r02routes/delete/{id}','App\Http\Controllers\R02routeController@delete')->middleware('auth');
// R03ROUTES
Route::resource('/r03routes', R03routeController::class)->middleware('auth');
Route::get('r03routes/delete/{id}','App\Http\Controllers\R03routeController@delete')->middleware('auth');
// R04ROUTES
Route::resource('/r04routes', R04routeController::class)->middleware('auth');
Route::get('r04routes/delete/{id}','App\Http\Controllers\R04routeController@delete')->middleware('auth');
// R05ROUTES
Route::resource('/r05routes', R05routeController::class)->middleware('auth');
Route::get('r05routes/delete/{id}','App\Http\Controllers\R05routeController@delete')->middleware('auth');
// R06ROUTES
Route::resource('/r06routes', R06routeController::class)->middleware('auth');
Route::get('r06routes/delete/{id}','App\Http\Controllers\R06routeController@delete')->middleware('auth');
// R07ROUTES
Route::resource('/r07routes', R07routeController::class)->middleware('auth');
Route::get('r07routes/delete/{id}','App\Http\Controllers\R07routeController@delete')->middleware('auth');
// R08ROUTES
Route::resource('/r08routes', R08routeController::class)->middleware('auth');
Route::get('r08routes/delete/{id}','App\Http\Controllers\R08routeController@delete')->middleware('auth');
// R09ROUTES
Route::resource('/r09routes', R09routeController::class)->middleware('auth');
Route::get('r09routes/delete/{id}','App\Http\Controllers\R09routeController@delete')->middleware('auth');
// R10ROUTES
Route::resource('/r10routes', R10routeController::class)->middleware('auth');
Route::get('r10routes/delete/{id}','App\Http\Controllers\R10routeController@delete')->middleware('auth');

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

// ADS 2
Route::resource('/adds', AddController::class);
Route::get('adds/delete/{id}','App\Http\Controllers\AddController@delete')->middleware('auth');
Route::post('adds/file/{method}','App\Http\Controllers\AddController@file')->middleware('auth');

// Setup
Route::resource('/setup', SetupController::class)->middleware('auth');

// AUTH
Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::get('/{vue?}', function () {
    return view('layouts.vue');
})->where('vue', '[\/\w\.-]*');