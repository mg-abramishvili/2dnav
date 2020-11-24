<?php

namespace App\Http\Controllers;

use App\Models\R06route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR06routeController extends Controller
{
    public function index()
    {
        $r06routes = R06route::get();
        return view('front.routes.index', compact('r06routes'));
    }

    public function show($id)
    {
        $route = R06route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show6', compact('route', 'tagsall'));
    }

}
