<?php

namespace App\Http\Controllers;

use App\Models\Route02;
use App\Models\Scheme;
use App\Models\Store;
use Illuminate\Http\Request;

class Route02Controller extends Controller
{
    public function index()
    {
        $routes02 = Route02::get();
        return view('routes02.index', compact('routes02'));
    }

    public function create()
    {
        $schemes = Scheme::get();
        $stores = Store::get();
        return view('routes02.create', compact('schemes', 'stores'));
    }

    public function edit($id)
    {

        $routes02 = Route02::find($id);

        return view('routes02.edit', compact('routes02'));


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
        $routes02 = Route02::find($id);
        $routes02->delete();
        return redirect('/routes02');
    }

    public function store()
    {
        $data = request()->all();
        $routes02 = new Route02();
        $routes02->title = $data['title'];
        $routes02->scheme_id = $data['scheme_id'];
        $routes02->scheme2_id = $data['scheme2_id'];
        $routes02->store_id = $data['store_id'];
        $routes02->x_01 = $data['x_01'];
        $routes02->y_01 = $data['y_01'];
        $routes02->p_x_01 = $data['p_x_01'];
        $routes02->p_y_01 = $data['p_y_01'];
        $routes02->x_02 = $data['x_02'];
        $routes02->y_02 = $data['y_02'];
        $routes02->p_x_02 = $data['p_x_02'];
        $routes02->p_y_02 = $data['p_y_02'];
        $routes02->x_03 = $data['x_03'];
        $routes02->y_03 = $data['y_03'];
        $routes02->p_x_03 = $data['p_x_03'];
        $routes02->p_y_03 = $data['p_y_03'];
        $routes02->x_04 = $data['x_04'];
        $routes02->y_04 = $data['y_04'];
        $routes02->p_x_04 = $data['p_x_04'];
        $routes02->p_y_04 = $data['p_y_04'];
        $routes02->x_05 = $data['x_05'];
        $routes02->y_05 = $data['y_05'];
        $routes02->p_x_05 = $data['p_x_05'];
        $routes02->p_y_05 = $data['p_y_05'];
        $routes02->x_06 = $data['x_06'];
        $routes02->y_06 = $data['y_06'];
        $routes02->p_x_06 = $data['p_x_06'];
        $routes02->p_y_06 = $data['p_y_06'];
        $routes02->x_07 = $data['x_07'];
        $routes02->y_07 = $data['y_07'];
        $routes02->p_x_07 = $data['p_x_07'];
        $routes02->p_y_07 = $data['p_y_07'];
        $routes02->x_08 = $data['x_08'];
        $routes02->y_08 = $data['y_08'];
        $routes02->p_x_08 = $data['p_x_08'];
        $routes02->p_y_08 = $data['p_y_08'];
        $routes02->x_09 = $data['x_09'];
        $routes02->y_09 = $data['y_09'];
        $routes02->p_x_09 = $data['p_x_09'];
        $routes02->p_y_09 = $data['p_y_09'];
        $routes02->x_10 = $data['x_10'];
        $routes02->y_10 = $data['y_10'];
        $routes02->p_x_10 = $data['p_x_10'];
        $routes02->p_y_10 = $data['p_y_10'];
        $routes02->x_11 = $data['x_11'];
        $routes02->y_11 = $data['y_11'];
        $routes02->p_x_11 = $data['p_x_11'];
        $routes02->p_y_11 = $data['p_y_11'];
        $routes02->x_12 = $data['x_12'];
        $routes02->y_12 = $data['y_12'];
        $routes02->p_x_12 = $data['p_x_12'];
        $routes02->p_y_12 = $data['p_y_12'];
        $routes02->x_101 = $data['x_101'];
        $routes02->y_101 = $data['y_101'];
        $routes02->p_x_101 = $data['p_x_101'];
        $routes02->p_y_101 = $data['p_y_101'];
        $routes02->x_102 = $data['x_102'];
        $routes02->y_102 = $data['y_102'];
        $routes02->p_x_102 = $data['p_x_102'];
        $routes02->p_y_102 = $data['p_y_102'];
        $routes02->x_103 = $data['x_103'];
        $routes02->y_103 = $data['y_103'];
        $routes02->p_x_103 = $data['p_x_103'];
        $routes02->p_y_103 = $data['p_y_103'];
        $routes02->x_104 = $data['x_104'];
        $routes02->y_104 = $data['y_104'];
        $routes02->p_x_104 = $data['p_x_104'];
        $routes02->p_y_104 = $data['p_y_104'];
        $routes02->x_105 = $data['x_105'];
        $routes02->y_105 = $data['y_105'];
        $routes02->p_x_105 = $data['p_x_105'];
        $routes02->p_y_105 = $data['p_y_105'];
        $routes02->x_106 = $data['x_106'];
        $routes02->y_106 = $data['y_106'];
        $routes02->p_x_106 = $data['p_x_106'];
        $routes02->p_y_106 = $data['p_y_106'];
        $routes02->x_107 = $data['x_107'];
        $routes02->y_107 = $data['y_107'];
        $routes02->p_x_107 = $data['p_x_107'];
        $routes02->p_y_107 = $data['p_y_107'];
        $routes02->x_108 = $data['x_108'];
        $routes02->y_108 = $data['y_108'];
        $routes02->p_x_108 = $data['p_x_108'];
        $routes02->p_y_108 = $data['p_y_108'];
        $routes02->x_109 = $data['x_109'];
        $routes02->y_109 = $data['y_109'];
        $routes02->p_x_109 = $data['p_x_109'];
        $routes02->p_y_109 = $data['p_y_109'];
        $routes02->x_110 = $data['x_110'];
        $routes02->y_110 = $data['y_110'];
        $routes02->p_x_110 = $data['p_x_110'];
        $routes02->p_y_110 = $data['p_y_110'];
        $routes02->x_111 = $data['x_111'];
        $routes02->y_111 = $data['y_111'];
        $routes02->p_x_111 = $data['p_x_111'];
        $routes02->p_y_111 = $data['p_y_111'];
        $routes02->x_112 = $data['x_112'];
        $routes02->y_112 = $data['y_112'];
        $routes02->p_x_112 = $data['p_x_112'];
        $routes02->p_y_112 = $data['p_y_112'];
        $routes02->save();
        return redirect('/routes02');
    }

    public function update()
    {
        $data = request()->all();
        $routes02 = Route02::find($data['id']);
        $routes02->title = $data['title'];
        $routes02->save();
        return redirect('/routes02');
    }
}
