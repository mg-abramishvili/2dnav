<?php

namespace App\Http\Controllers;

use App\Models\Setup;
use App\Models\Ad;
use App\Models\Scheme;
use App\Models\Store;
use App\Models\Tag;
use App\Models\Route;
use App\Models\Special;
use App\Models\Kiosk;
use App\Models\Transport;
use App\Http\Resources\RouteResource;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function setup()
    {
        return Setup::where('id', '1')->first();
    }

    public function setup_post(Request $request)
    {
        $data = request()->all();
        $setup = Setup::first();
        $setup->nta = $data['nta'];
        $setup->save();
        return 'OK';
    }

    public function schemes()
    {
        return Scheme::orderBy('id', 'desc')->get();
    }

    public function banners()
    {
        return Ad::with('stores.routes')->get();
    }

    public function stores()
    {
        return Store::with('routes', 'schemes', 'tags')->get();
    }

    public function storeItem($id)
    {
        return Store::where('id', $id)->with('tags', 'schemes', 'specials')->first();
    }

    public function stores_category_filter($title, Request $request)
    {
        return Store::with('routes', 'schemes')->whereHas('tags', function($q) use($title) {
            $q->where('title', '=', $title);
        })->get();
    }

    public function tags()
    {
        return Tag::with('markimages', 'store')->get();
    }

    public function routes()
	{
		return RouteResource::collection(Route::with('schemes', 'stores')->orderBy('created_at', 'asc')->get());
	}
	
	public function routeItem($id)
    {
        return Route::where('id', $id)->with('stores.tags', 'schemes', 'schemes2', 'stores.schemes', 'stores.specials')->first();
    }

    public function specials()
    {
        return Special::with('stores.routes')->get();
    }

    public function kioskItem($kiosk)
    {
        return Kiosk::where('kiosk', $kiosk)->with('schemes')->first();
    }

    public function transport($id)
    {
        return Transport::where('id', '1')->first();
    }
}
