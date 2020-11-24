<?php

namespace App\Http\Controllers;

use App\Models\R06route;
use App\Models\Scheme;
use App\Models\Store;
use Illuminate\Http\Request;

class R06routeController extends Controller
{
    public function index()
    {
        $r06routes = R06route::get();
        return view('r06routes.index', compact('r06routes'));
    }

    public function create()
    {
        $schemes = Scheme::get();
        $stores = Store::get();
        return view('r06routes.create', compact('schemes', 'stores'));
    }

    public function edit($id)
    {
        $r06routes = R06route::find($id);
        return view('r06routes.edit', compact('r06routes'));
    }

    public function delete($id)
    {
        $r06routes = R06route::find($id);
        $r06routes->delete();
        $r06routes->stores()->detach();
        return redirect('/r06routes');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'stores' => 'required',
            'scheme_id' => 'required',
            'x_01' => 'required',
        ]);

        $data = request()->all();
        $r06routes = new R06route();
        $r06routes->title = $data['title'];
        $r06routes->scheme_id = $data['scheme_id'];
        $r06routes->scheme2_id = $data['scheme2_id'];
        $r06routes->t_1_begin = $data['t_1_begin'];
        $r06routes->t_1_end = $data['t_1_end'];
        $r06routes->t_2_begin = $data['t_2_begin'];
        $r06routes->t_2_end = $data['t_2_end'];
        $r06routes->x_01 = $data['x_01'];
        $r06routes->y_01 = $data['y_01'];
        $r06routes->p_x_01 = $data['p_x_01'];
        $r06routes->p_y_01 = $data['p_y_01'];
        $r06routes->x_02 = $data['x_02'];
        $r06routes->y_02 = $data['y_02'];
        $r06routes->p_x_02 = $data['p_x_02'];
        $r06routes->p_y_02 = $data['p_y_02'];
        $r06routes->x_03 = $data['x_03'];
        $r06routes->y_03 = $data['y_03'];
        $r06routes->p_x_03 = $data['p_x_03'];
        $r06routes->p_y_03 = $data['p_y_03'];
        $r06routes->x_04 = $data['x_04'];
        $r06routes->y_04 = $data['y_04'];
        $r06routes->p_x_04 = $data['p_x_04'];
        $r06routes->p_y_04 = $data['p_y_04'];
        $r06routes->x_05 = $data['x_05'];
        $r06routes->y_05 = $data['y_05'];
        $r06routes->p_x_05 = $data['p_x_05'];
        $r06routes->p_y_05 = $data['p_y_05'];
        $r06routes->x_06 = $data['x_06'];
        $r06routes->y_06 = $data['y_06'];
        $r06routes->p_x_06 = $data['p_x_06'];
        $r06routes->p_y_06 = $data['p_y_06'];
        $r06routes->x_07 = $data['x_07'];
        $r06routes->y_07 = $data['y_07'];
        $r06routes->p_x_07 = $data['p_x_07'];
        $r06routes->p_y_07 = $data['p_y_07'];
        $r06routes->x_08 = $data['x_08'];
        $r06routes->y_08 = $data['y_08'];
        $r06routes->p_x_08 = $data['p_x_08'];
        $r06routes->p_y_08 = $data['p_y_08'];
        $r06routes->x_09 = $data['x_09'];
        $r06routes->y_09 = $data['y_09'];
        $r06routes->p_x_09 = $data['p_x_09'];
        $r06routes->p_y_09 = $data['p_y_09'];
        $r06routes->x_10 = $data['x_10'];
        $r06routes->y_10 = $data['y_10'];
        $r06routes->p_x_10 = $data['p_x_10'];
        $r06routes->p_y_10 = $data['p_y_10'];
        $r06routes->x_11 = $data['x_11'];
        $r06routes->y_11 = $data['y_11'];
        $r06routes->p_x_11 = $data['p_x_11'];
        $r06routes->p_y_11 = $data['p_y_11'];
        $r06routes->x_12 = $data['x_12'];
        $r06routes->y_12 = $data['y_12'];
        $r06routes->p_x_12 = $data['p_x_12'];
        $r06routes->p_y_12 = $data['p_y_12'];
        $r06routes->x_101 = $data['x_101'];
        $r06routes->y_101 = $data['y_101'];
        $r06routes->p_x_101 = $data['p_x_101'];
        $r06routes->p_y_101 = $data['p_y_101'];
        $r06routes->x_102 = $data['x_102'];
        $r06routes->y_102 = $data['y_102'];
        $r06routes->p_x_102 = $data['p_x_102'];
        $r06routes->p_y_102 = $data['p_y_102'];
        $r06routes->x_103 = $data['x_103'];
        $r06routes->y_103 = $data['y_103'];
        $r06routes->p_x_103 = $data['p_x_103'];
        $r06routes->p_y_103 = $data['p_y_103'];
        $r06routes->x_104 = $data['x_104'];
        $r06routes->y_104 = $data['y_104'];
        $r06routes->p_x_104 = $data['p_x_104'];
        $r06routes->p_y_104 = $data['p_y_104'];
        $r06routes->x_105 = $data['x_105'];
        $r06routes->y_105 = $data['y_105'];
        $r06routes->p_x_105 = $data['p_x_105'];
        $r06routes->p_y_105 = $data['p_y_105'];
        $r06routes->x_106 = $data['x_106'];
        $r06routes->y_106 = $data['y_106'];
        $r06routes->p_x_106 = $data['p_x_106'];
        $r06routes->p_y_106 = $data['p_y_106'];
        $r06routes->x_107 = $data['x_107'];
        $r06routes->y_107 = $data['y_107'];
        $r06routes->p_x_107 = $data['p_x_107'];
        $r06routes->p_y_107 = $data['p_y_107'];
        $r06routes->x_108 = $data['x_108'];
        $r06routes->y_108 = $data['y_108'];
        $r06routes->p_x_108 = $data['p_x_108'];
        $r06routes->p_y_108 = $data['p_y_108'];
        $r06routes->x_109 = $data['x_109'];
        $r06routes->y_109 = $data['y_109'];
        $r06routes->p_x_109 = $data['p_x_109'];
        $r06routes->p_y_109 = $data['p_y_109'];
        $r06routes->x_110 = $data['x_110'];
        $r06routes->y_110 = $data['y_110'];
        $r06routes->p_x_110 = $data['p_x_110'];
        $r06routes->p_y_110 = $data['p_y_110'];
        $r06routes->x_111 = $data['x_111'];
        $r06routes->y_111 = $data['y_111'];
        $r06routes->p_x_111 = $data['p_x_111'];
        $r06routes->p_y_111 = $data['p_y_111'];
        $r06routes->x_112 = $data['x_112'];
        $r06routes->y_112 = $data['y_112'];
        $r06routes->p_x_112 = $data['p_x_112'];
        $r06routes->p_y_112 = $data['p_y_112'];
        $r06routes->save();
        $r06routes->stores()->attach($request->stores, ['r06route_id' => $r06routes->id]);
        return redirect('/r06routes');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'stores' => 'required',
            'scheme_id' => 'required',
            'x_01' => 'required',
        ]);

        $data = request()->all();
        $r06routes = R06route::find($data['id']);
        $r06routes->title = $data['title'];
        $r06routes->save();
        $r06routes->stores()->detach();
        $r06routes->stores()->attach($request->stores, ['r06route_id' => $r06routes->id]);
        return redirect('/r06routes');
    }
}
