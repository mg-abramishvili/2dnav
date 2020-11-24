<?php

namespace App\Http\Controllers;

use App\Models\R04route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR04routeController extends Controller
{
    public function index()
    {
        $r04routes = R04route::get();
        return view('front.routes.index', compact('r04routes'));
    }

    public function show($id)
    {
        $route = R04route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show4', compact('route', 'tagsall'));
    }

}
