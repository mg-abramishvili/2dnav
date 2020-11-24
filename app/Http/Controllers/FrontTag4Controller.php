<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class FrontTag4Controller extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.r04routes')->get();
        return view('front.tags.index4', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $tagsall = Tag::all();
        return view('front.tags.show4', compact('tag', 'tagsall'));
    }

}
