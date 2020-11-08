<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::all();
        return view('ads.index', compact('ads'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function edit($id)
    {

        $ads = Ad::find($id);
        return view('ads.edit', compact('ads'));


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
        return redirect('/ads');
    }

    public function store()
    {
        $data = request()->all();
        $ads = new Ad();
        $ads->title = $data['title'];
        $ads->adfile = $data['adfile'];
        $ads->save();
        return redirect('/ads');
    }

    public function update()
    {
        $data = request()->all();
        $ads = Ad::find($data['id']);
        $ads->title = $data['title'];
        $ads->adfile = $data['adfile'];
        $ads->save();
        return redirect('/ads');
    }
}
