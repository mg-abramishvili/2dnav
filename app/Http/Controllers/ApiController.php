<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Route;
use App\Http\Resources\RouteResource;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function schemes()
    {
        return Scheme::all();
    }

    public function banners()
    {
        return Ad::all();
    }

    public function stores()
    {
        return Store::with('r01routes')->get();
    }

    public function r01routes()
	{
		return RouteResource::collection(Route::with('schemes')->orderBy('created_at', 'asc')->get());
	}
	
	public function r01routeItem($id)
    {
        return Route::where('id', $id)->with('schemes', 'schemes2')->first();
    }
}
