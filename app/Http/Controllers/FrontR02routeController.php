<?php

namespace App\Http\Controllers;

use App\Models\R02route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR02routeController extends Controller
{
    public function index()
    {
        $r02routes = R02route::get();
        return view('front.routes.index', compact('r02routes'));
    }

    public function show($id)
    {
        $route = R02route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show2', compact('route', 'tagsall'));
    }

}
