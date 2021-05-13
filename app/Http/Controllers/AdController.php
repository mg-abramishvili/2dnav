<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Store;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::all();
        return view('ads.index', compact('ads'));
    }

    public function create()
    {
        $stores = Store::all();
        return view('ads.create', compact('stores'));
    }

    public function edit($id)
    {

        $ads = Ad::find($id);
        $stores = Store::all();
        return view('ads.edit', compact('ads', 'stores'));


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

        if (request()->file('adfile')) {
            $file = request()->file('adfile');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }

    }

    public function delete($id)
    {
        $ads = Ad::find($id);
        $ads->delete();
        $ads->stores()->detach();
        return redirect('/ads');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'adfile' => 'required',
        ]);

        $data = request()->all();
        $ads = new Ad();
        $ads->title = $data['title'];
        $ads->adfile = $data['adfile'];
        $ads->save();
        if($data['stores'] == 'no_store') {
            $ads->stores()->detach();
        } else {
            $ads->stores()->attach($request->stores, ['ad_id' => $ads->id]);
        }
        return redirect('/ads');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'adfile' => 'required',
        ]);

        $data = request()->all();
        $ads = Ad::find($data['id']);
        $ads->title = $data['title'];
        $ads->adfile = $data['adfile'];
        $ads->save();
        if($data['stores'] == 'no_store') {
            $ads->stores()->detach();
        } else {
            $ads->stores()->attach($request->stores, ['ad_id' => $ads->id]);
        }
        return redirect('/ads');
    }
}
