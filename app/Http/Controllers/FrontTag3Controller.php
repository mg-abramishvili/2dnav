<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag3Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r03routes')->get();
        return view('front.tags.index3', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show3', compact('tag', 'tagsall'));
    }

}
