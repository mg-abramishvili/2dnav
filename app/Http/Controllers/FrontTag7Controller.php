<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag7Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r07routes')->get();
        return view('front.tags.index7', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show7', compact('tag', 'tagsall'));
    }

}
