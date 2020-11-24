<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Store;
use Illuminate\Http\Request;

class FrontSearchController extends Controller
{
    public function index()
    {
        $stores = Store::with('r01routes')->get();
        $tagsall = Tag::all();
        return view('front.search', compact('stores', 'tagsall'));
    }

    public function index2()
    {
        $stores = Store::with('r02routes')->get();
        $tagsall = Tag::all();
        return view('front.search2', compact('stores', 'tagsall'));
    }

    public function index3()
    {
        $stores = Store::with('r03routes')->get();
        $tagsall = Tag::all();
        return view('front.search3', compact('stores', 'tagsall'));
    }

    public function index4()
    {
        $stores = Store::with('r04routes')->get();
        $tagsall = Tag::all();
        return view('front.search4', compact('stores', 'tagsall'));
    }

    public function index5()
    {
        $stores = Store::with('r05routes')->get();
        $tagsall = Tag::all();
        return view('front.search5', compact('stores', 'tagsall'));
    }

    public function index6()
    {
        $stores = Store::with('r06routes')->get();
        $tagsall = Tag::all();
        return view('front.search6', compact('stores', 'tagsall'));
    }

    public function index7()
    {
        $stores = Store::with('r07routes')->get();
        $tagsall = Tag::all();
        return view('front.search7', compact('stores', 'tagsall'));
    }

    public function index8()
    {
        $stores = Store::with('r08routes')->get();
        $tagsall = Tag::all();
        return view('front.search8', compact('stores', 'tagsall'));
    }

    public function index9()
    {
        $stores = Store::with('r09routes')->get();
        $tagsall = Tag::all();
        return view('front.search9', compact('stores', 'tagsall'));
    }

    public function index10()
    {
        $stores = Store::with('r10routes')->get();
        $tagsall = Tag::all();
        return view('front.search10', compact('stores', 'tagsall'));
    }

}
