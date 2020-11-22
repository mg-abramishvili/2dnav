<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Scheme;
use App\Models\Store;
use Illuminate\Http\Request;

class FrontRouteController extends Controller
{
    public function index()
    {
        $routes = Route::get();
        return view('front.routes.index', compact('routes'));
    }

    public function show($id)
    {
        $route = Route::find($id);
        return view('front.routes.show', compact('route'));
    }

}
