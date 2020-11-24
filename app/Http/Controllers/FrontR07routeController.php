<?php

namespace App\Http\Controllers;

use App\Models\R07route;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontR07routeController extends Controller
{
    public function index()
    {
        $r07routes = R07route::get();
        return view('front.routes.index', compact('r07routes'));
    }

    public function show($id)
    {
        $route = R07route::find($id);
        $tagsall = Tag::all();
        return view('front.routes.show7', compact('route', 'tagsall'));
    }

}
