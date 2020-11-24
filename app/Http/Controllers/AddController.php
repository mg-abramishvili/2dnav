<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add;

class AddController extends Controller
{
    public function index()
    {
        $adds = Add::all();
        return view('adds.index', compact('adds'));
    }

    public function create()
    {
        return view('adds.create');
    }

    public function edit($id)
    {

        $adds = Add::find($id);
        return view('adds.edit', compact('adds'));


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
            $file->move(public_path() . '/uploadds', $filename);

            return \Response::make('/uploadds/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }

    }

    public function delete($id)
    {
        $adds = Add::find($id);
        $adds->delete();
        return redirect('/adds');
    }

    public function store()
    {
        $data = request()->all();
        $adds = new Ad();
        $adds->title = $data['title'];
        $adds->adfile = $data['adfile'];
        $adds->save();
        return redirect('/adds');
    }

    public function update()
    {
        $data = request()->all();
        $adds = Add::find($data['id']);
        $adds->title = $data['title'];
        $adds->adfile = $data['adfile'];
        $adds->save();
        return redirect('/adds');
    }
}
