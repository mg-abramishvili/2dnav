<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag5Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r05routes')->get();
        return view('front.tags.index5', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show5', compact('tag', 'tagsall'));
    }

}
