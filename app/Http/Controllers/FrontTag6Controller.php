<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag6Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r06routes')->get();
        return view('front.tags.index6', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show6', compact('tag', 'tagsall'));
    }

}
