<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Scheme;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        $schememain = Scheme::where('id', '1')->first();
        return view('welcome', compact('routes', 'schememain'));
    }
}
