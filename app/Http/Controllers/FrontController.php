<?php

namespace App\Http\Controllers;

use App\Models\R01route;
use App\Models\R02route;
use App\Models\R03route;
use App\Models\R04route;
use App\Models\R05route;
use App\Models\R06route;
use App\Models\R07route;
use App\Models\R08route;
use App\Models\R09route;
use App\Models\R10route;
use App\Models\Store;
use App\Models\Scheme;
use App\Models\Ad;
use App\Models\Add;
use App\Models\Tag;
use App\Models\Setup;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $stores = Store::with('r01routes', 'tags')->get();
        $r01routes = R01route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome', compact('r01routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index02()
    {
        $stores = Store::with('r02routes', 'tags')->get();
        $r02routes = R02route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome2', compact('r02routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index03()
    {
        $stores = Store::with('r03routes', 'tags')->get();
        $r03routes = R03route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome3', compact('r03routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index04()
    {
        $stores = Store::with('r04routes', 'tags')->get();
        $r04routes = R04route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome4', compact('r04routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index05()
    {
        $stores = Store::with('r05routes', 'tags')->get();
        $r05routes = R05route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome5', compact('r05routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index06()
    {
        $stores = Store::with('r06routes', 'tags')->get();
        $r06routes = R06route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome6', compact('r06routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index07()
    {
        $stores = Store::with('r07routes', 'tags')->get();
        $r07routes = R07route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome7', compact('r07routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index08()
    {
        $stores = Store::with('r08routes', 'tags')->get();
        $r08routes = R08route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome8', compact('r08routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index09()
    {
        $stores = Store::with('r09routes', 'tags')->get();
        $r09routes = R09route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome9', compact('r09routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }

    public function index10()
    {
        $stores = Store::with('r10routes', 'tags')->get();
        $r10routes = R10route::with('schemes.marks.markimages')->get();
        $schemes = Scheme::with('marks.markimages')->get();
        $schememain = Scheme::where('id', '3')->first();
        $tags = Tag::all();
        $ads = Ad::all();
        $adds = Add::all();
        $setup = Setup::where('id', '1')->first();
        return view('front.welcome10', compact('r10routes', 'schemes', 'schememain', 'stores', 'tags', 'ads', 'adds', 'setup'));
    }
}
