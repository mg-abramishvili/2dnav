<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.routes')->get();
        return view('front.tags.index', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show', compact('tag', 'tagsall'));
    }

}
