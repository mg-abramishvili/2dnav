<?php

namespace App\Http\Controllers;

use App\Models\R08route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR08routeController extends Controller
{
    public function index()
    {
        $r08routes = R08route::get();
        return view('front.routes.index', compact('r08routes'));
    }

    public function show($id)
    {
        $route = R08route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show8', compact('route', 'tagsall'));
    }

}
