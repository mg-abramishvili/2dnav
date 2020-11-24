<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Route02;
use App\Models\Store;
use App\Models\Scheme;
use App\Models\Ad;
use App\Models\Add;
use App\Models\Tag;
use App\Models\Setup;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $stores = Store::with('routes', 'tags')->get();
        $routes = Route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome', compact('routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index02()
    {
        $stores = Store::with('routes02', 'tags')->get();
        $routes = Route02::with('schemes.marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $ads = Ad::all();
        $setup = Setup::where('id', '1')->first();
        return view('welcome', compact('routes', 'schememain', 'stores', 'ads', 'setup'));
    }
}
