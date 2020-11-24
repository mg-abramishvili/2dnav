<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag10Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r10routes')->get();
        return view('front.tags.index10', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show10', compact('tag', 'tagsall'));
    }

}
