<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Ad;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use App\Models\Route;
use App\Http\Resources\RouteResource;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function setup()
    {
        return Setup::where('id', '1')->first();
    }

    public function schemes()
    {
        return Scheme::orderBy('id', 'desc')->get();
    }

    public function banners()
    {
        return Ad::all();
    }

    public function stores()
    {
        return Store::with('routes')->get();
    }

    public function tags()
    {
        return Tag::all();
    }

    public function routes()
	{
		return RouteResource::collection(Route::with('schemes')->orderBy('created_at', 'asc')->get());
	}
	
	public function routeItem($id)
    {
        return Route::where('id', $id)->with('stores', 'schemes', 'schemes2')->first();
    }
}
