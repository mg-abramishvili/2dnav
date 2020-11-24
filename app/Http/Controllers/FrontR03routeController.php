<?php

namespace App\Http\Controllers;

use App\Models\R03route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR03routeController extends Controller
{
    public function index()
    {
        $r03routes = R03route::get();
        return view('front.routes.index', compact('r03routes'));
    }

    public function show($id)
    {
        $route = R03route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show3', compact('route', 'tagsall'));
    }

}
