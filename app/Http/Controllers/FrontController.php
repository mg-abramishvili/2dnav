<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Store;
use App\Models\Scheme;
use App\Models\Ad;
use App\Models\Setup;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $stores = Store::with('routes', 'tags')->get();
        $routes = Route::with('schemes.marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $ads = Ad::all();
        $setup = Setup::where('id', '1')->first();
        return view('welcome', compact('routes', 'schememain', 'stores', 'ads', 'setup'));
    }
}
