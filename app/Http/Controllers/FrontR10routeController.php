<?php

namespace App\Http\Controllers;

use App\Models\R10route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR10routeController extends Controller
{
    public function index()
    {
        $r10routes = R10route::get();
        return view('front.routes.index', compact('r10routes'));
    }

    public function show($id)
    {
        $route = R10route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show10', compact('route', 'tagsall'));
    }

}
