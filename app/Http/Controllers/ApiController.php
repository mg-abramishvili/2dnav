<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\R01route;
use App\Http\Resources\R01routeResource;
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
		return R01routeResource::collection(R01route::with('schemes')->orderBy('created_at', 'asc')->get());
	}
	
	public function r01routeItem($id)
    {
        return R01route::where('id', $id)->with('schemes', 'schemes2')->first();
    }
}
