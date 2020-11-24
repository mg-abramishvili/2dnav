<?php

namespace App\Http\Controllers;

use App\Models\R10route;
use App\Models\Scheme;
use App\Models\Store;
use Illuminate\Http\Request;

class R10routeController extends Controller
{
    public function index()
    {
        $r10routes = R10route::get();
        return view('r10routes.index', compact('r10routes'));
    }

    public function create()
    {
        $schemes = Scheme::get();
        $stores = Store::get();
        return view('r10routes.create', compact('schemes', 'stores'));
    }

    public function edit($id)
    {
        $r10routes = R10route::find($id);
        return view('r10routes.edit', compact('r10routes'));
    }

    public function delete($id)
    {
        $r10routes = R10route::find($id);
        $r10routes->delete();
        $r10routes->stores()->detach();
        return redirect('/r10routes');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'stores' => 'required',
            'scheme_id' => 'required',
            'x_01' => 'required',
        ]);

        $data = request()->all();
        $r10routes = new R10route();
        $r10routes->title = $data['title'];
        $r10routes->scheme_id = $data['scheme_id'];
        $r10routes->scheme2_id = $data['scheme2_id'];
        $r10routes->t_1_begin = $data['t_1_begin'];
        $r10routes->t_1_end = $data['t_1_end'];
        $r10routes->t_2_begin = $data['t_2_begin'];
        $r10routes->t_2_end = $data['t_2_end'];
        $r10routes->x_01 = $data['x_01'];
        $r10routes->y_01 = $data['y_01'];
        $r10routes->p_x_01 = $data['p_x_01'];
        $r10routes->p_y_01 = $data['p_y_01'];
        $r10routes->x_02 = $data['x_02'];
        $r10routes->y_02 = $data['y_02'];
        $r10routes->p_x_02 = $data['p_x_02'];
        $r10routes->p_y_02 = $data['p_y_02'];
        $r10routes->x_03 = $data['x_03'];
        $r10routes->y_03 = $data['y_03'];
        $r10routes->p_x_03 = $data['p_x_03'];
        $r10routes->p_y_03 = $data['p_y_03'];
        $r10routes->x_04 = $data['x_04'];
        $r10routes->y_04 = $data['y_04'];
        $r10routes->p_x_04 = $data['p_x_04'];
        $r10routes->p_y_04 = $data['p_y_04'];
        $r10routes->x_05 = $data['x_05'];
        $r10routes->y_05 = $data['y_05'];
        $r10routes->p_x_05 = $data['p_x_05'];
        $r10routes->p_y_05 = $data['p_y_05'];
        $r10routes->x_06 = $data['x_06'];
        $r10routes->y_06 = $data['y_06'];
        $r10routes->p_x_06 = $data['p_x_06'];
        $r10routes->p_y_06 = $data['p_y_06'];
        $r10routes->x_07 = $data['x_07'];
        $r10routes->y_07 = $data['y_07'];
        $r10routes->p_x_07 = $data['p_x_07'];
        $r10routes->p_y_07 = $data['p_y_07'];
        $r10routes->x_08 = $data['x_08'];
        $r10routes->y_08 = $data['y_08'];
        $r10routes->p_x_08 = $data['p_x_08'];
        $r10routes->p_y_08 = $data['p_y_08'];
        $r10routes->x_09 = $data['x_09'];
        $r10routes->y_09 = $data['y_09'];
        $r10routes->p_x_09 = $data['p_x_09'];
        $r10routes->p_y_09 = $data['p_y_09'];
        $r10routes->x_10 = $data['x_10'];
        $r10routes->y_10 = $data['y_10'];
        $r10routes->p_x_10 = $data['p_x_10'];
        $r10routes->p_y_10 = $data['p_y_10'];
        $r10routes->x_11 = $data['x_11'];
        $r10routes->y_11 = $data['y_11'];
        $r10routes->p_x_11 = $data['p_x_11'];
        $r10routes->p_y_11 = $data['p_y_11'];
        $r10routes->x_12 = $data['x_12'];
        $r10routes->y_12 = $data['y_12'];
        $r10routes->p_x_12 = $data['p_x_12'];
        $r10routes->p_y_12 = $data['p_y_12'];
        $r10routes->x_101 = $data['x_101'];
        $r10routes->y_101 = $data['y_101'];
        $r10routes->p_x_101 = $data['p_x_101'];
        $r10routes->p_y_101 = $data['p_y_101'];
        $r10routes->x_102 = $data['x_102'];
        $r10routes->y_102 = $data['y_102'];
        $r10routes->p_x_102 = $data['p_x_102'];
        $r10routes->p_y_102 = $data['p_y_102'];
        $r10routes->x_103 = $data['x_103'];
        $r10routes->y_103 = $data['y_103'];
        $r10routes->p_x_103 = $data['p_x_103'];
        $r10routes->p_y_103 = $data['p_y_103'];
        $r10routes->x_104 = $data['x_104'];
        $r10routes->y_104 = $data['y_104'];
        $r10routes->p_x_104 = $data['p_x_104'];
        $r10routes->p_y_104 = $data['p_y_104'];
        $r10routes->x_105 = $data['x_105'];
        $r10routes->y_105 = $data['y_105'];
        $r10routes->p_x_105 = $data['p_x_105'];
        $r10routes->p_y_105 = $data['p_y_105'];
        $r10routes->x_106 = $data['x_106'];
        $r10routes->y_106 = $data['y_106'];
        $r10routes->p_x_106 = $data['p_x_106'];
        $r10routes->p_y_106 = $data['p_y_106'];
        $r10routes->x_107 = $data['x_107'];
        $r10routes->y_107 = $data['y_107'];
        $r10routes->p_x_107 = $data['p_x_107'];
        $r10routes->p_y_107 = $data['p_y_107'];
        $r10routes->x_108 = $data['x_108'];
        $r10routes->y_108 = $data['y_108'];
        $r10routes->p_x_108 = $data['p_x_108'];
        $r10routes->p_y_108 = $data['p_y_108'];
        $r10routes->x_109 = $data['x_109'];
        $r10routes->y_109 = $data['y_109'];
        $r10routes->p_x_109 = $data['p_x_109'];
        $r10routes->p_y_109 = $data['p_y_109'];
        $r10routes->x_110 = $data['x_110'];
        $r10routes->y_110 = $data['y_110'];
        $r10routes->p_x_110 = $data['p_x_110'];
        $r10routes->p_y_110 = $data['p_y_110'];
        $r10routes->x_111 = $data['x_111'];
        $r10routes->y_111 = $data['y_111'];
        $r10routes->p_x_111 = $data['p_x_111'];
        $r10routes->p_y_111 = $data['p_y_111'];
        $r10routes->x_112 = $data['x_112'];
        $r10routes->y_112 = $data['y_112'];
        $r10routes->p_x_112 = $data['p_x_112'];
        $r10routes->p_y_112 = $data['p_y_112'];
        $r10routes->save();
        $r10routes->stores()->attach($request->stores, ['r10route_id' => $r10routes->id]);
        return redirect('/r10routes');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'stores' => 'required',
            'scheme_id' => 'required',
            'x_01' => 'required',
        ]);

        $data = request()->all();
        $r10routes = R10route::find($data['id']);
        $r10routes->title = $data['title'];
        $r10routes->save();
        $r10routes->stores()->detach();
        $r10routes->stores()->attach($request->stores, ['r10route_id' => $r10routes->id]);
        return redirect('/r10routes');
    }
}
