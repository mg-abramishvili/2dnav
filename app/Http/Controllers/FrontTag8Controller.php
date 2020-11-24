<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag8Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r08routes')->get();
        return view('front.tags.index8', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show8', compact('tag', 'tagsall'));
    }

}
