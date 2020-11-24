<?php

namespace App\Http\Controllers;

use App\Models\R09route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR09routeController extends Controller
{
    public function index()
    {
        $r09routes = R09route::get();
        return view('front.routes.index', compact('r09routes'));
    }

    public function show($id)
    {
        $route = R09route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show9', compact('route', 'tagsall'));
    }

}
