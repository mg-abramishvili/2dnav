<?php

namespace App\Http\Controllers;

use App\Models\R05route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR05routeController extends Controller
{
    public function index()
    {
        $r05routes = R05route::get();
        return view('front.routes.index', compact('r05routes'));
    }

    public function show($id)
    {
        $route = R05route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show5', compact('route', 'tagsall'));
    }

}
