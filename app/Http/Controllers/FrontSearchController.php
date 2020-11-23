<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Store;
use Illuminate\Http\Request;

class FrontSearchController extends Controller
{
    public function index()
    {
        $stores = Store::with('routes')->get();
        $tagsall = Tag::all();
        return view('front.search', compact('stores', 'tagsall'));
    }

}
