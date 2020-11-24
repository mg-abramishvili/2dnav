<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag9Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r09routes')->get();
        return view('front.tags.index9', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show9', compact('tag', 'tagsall'));
    }

}
