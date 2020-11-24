<?php

namespace App\Http\Controllers;

use App\Models\R01route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR01routeController extends Controller
{
    public function index()
    {
        $r01routes = R01route::get();
        return view('front.routes.index', compact('r01routes'));
    }

    public function show($id)
    {
        $route = R01route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show', compact('route', 'tagsall'));
    }

}
