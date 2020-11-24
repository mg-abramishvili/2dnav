<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag2Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r02routes')->get();
        return view('front.tags.index2', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show2', compact('tag', 'tagsall'));
    }

}
