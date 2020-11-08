<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Store;
use App\Models\Scheme;
use App\Models\Ad;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $stores = Store::with('routes', 'tags')->get();
        $routes = Route::all();
        $schememain = Scheme::where('id', '2')->first();
        $ads = Ad::all();
        return view('welcome', compact('routes', 'schememain', 'stores', 'ads'));
    }
}
