<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Scheme;
use App\Models\Store;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::get();
        return view('routes.index', compact('routes'));
    }

    public function create()
    {
        $schemes = Scheme::get();
        $stores = Store::get();
        return view('routes.create', compact('schemes', 'stores'));
    }

    public function edit($id)
    {

        $routes = Route::find($id);

        return view('routes.edit', compact('routes'));


    }

    public function file($type)
    {

        switch ($type) {
            case 'upload':
                return $this->upload();


        }

        return \Response::make('success', 200, [
            'Content-Disposition' => 'inline',
        ]);
    }

    public function upload()
    {

        if (request()->file('image')) {
            $file = request()->file('image');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }

    }

    public function delete($id)
    {
        $routes = Route::find($id);
        $routes->delete();
        return redirect('/routes');
    }

    public function store()
    {
        $data = request()->all();
        $routes = new Route();
        $routes->title = $data['title'];
        $routes->scheme_id = $data['scheme_id'];
        $routes->scheme2_id = $data['scheme2_id'];
        $routes->store_id = $data['store_id'];
        $routes->x_01 = $data['x_01'];
        $routes->y_01 = $data['y_01'];
        $routes->p_x_01 = $data['p_x_01'];
        $routes->p_y_01 = $data['p_y_01'];
        $routes->x_02 = $data['x_02'];
        $routes->y_02 = $data['y_02'];
        $routes->p_x_02 = $data['p_x_02'];
        $routes->p_y_02 = $data['p_y_02'];
        $routes->x_03 = $data['x_03'];
        $routes->y_03 = $data['y_03'];
        $routes->p_x_03 = $data['p_x_03'];
        $routes->p_y_03 = $data['p_y_03'];
        $routes->x_04 = $data['x_04'];
        $routes->y_04 = $data['y_04'];
        $routes->p_x_04 = $data['p_x_04'];
        $routes->p_y_04 = $data['p_y_04'];
        $routes->x_05 = $data['x_05'];
        $routes->y_05 = $data['y_05'];
        $routes->p_x_05 = $data['p_x_05'];
        $routes->p_y_05 = $data['p_y_05'];
        $routes->x_06 = $data['x_06'];
        $routes->y_06 = $data['y_06'];
        $routes->p_x_06 = $data['p_x_06'];
        $routes->p_y_06 = $data['p_y_06'];
        $routes->save();
        return redirect('/routes');
    }

    public function update()
    {
        $data = request()->all();
        $routes = Route::find($data['id']);
        $routes->title = $data['title'];
        $routes->save();
        return redirect('/routes');
    }
}
