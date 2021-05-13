<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Special;
use App\Models\Store;

class SpecialController extends Controller
{
    public function index()
    {
        $specials = Special::all();
        return view('specials.index', compact('specials'));
    }

    public function create()
    {
        $stores = Store::all();
        return view('specials.create', compact('stores'));
    }

    public function edit($id)
    {

        $specials = Special::find($id);
        $stores = Store::all();
        return view('specials.edit', compact('specials', 'stores'));


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

        if (request()->file('specialfile')) {
            $file = request()->file('specialfile');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }

    }

    public function delete($id)
    {
        $specials = Special::find($id);
        $specials->delete();
        $specials->stores()->detach();
        return redirect('/specials');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'specialfile' => 'required',
        ]);

        $data = request()->all();
        $specials = new Special();
        $specials->title = $data['title'];
        $specials->specialfile = $data['specialfile'];
        $specials->save();
        if($data['stores'] == 'no_store') {
            $specials->stores()->detach();
        } else {
            $specials->stores()->attach($request->stores, ['special_id' => $specials->id]);
        }
        return redirect('/specials');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'specialfile' => 'required',
        ]);

        $data = request()->all();
        $specials = Special::find($data['id']);
        $specials->title = $data['title'];
        $specials->specialfile = $data['specialfile'];
        $specials->save();
        if($data['stores'] == 'no_store') {
            $specials->stores()->detach();
        } else {
            $specials->stores()->attach($request->stores, ['special_id' => $specials->id]);
        }
        return redirect('/specials');
    }
}