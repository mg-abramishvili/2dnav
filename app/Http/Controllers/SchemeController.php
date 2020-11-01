<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    public function index()
    {
        $schemes = Scheme::get();
        return view('schemes.index', compact('schemes'));

    }

    public function create()
    {

        return view('schemes.create');

    }

    public function edit($id)
    {

        $schemes = Scheme::find($id);

        return view('schemes.edit', compact('schemes'));


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
        $schemes = Scheme::find($id);
        $schemes->delete();
        return redirect('/schemes');
    }

    public function store()
    {
        $data = request()->all();
        $schemes = new Scheme();
        $schemes->title = $data['title'];
        $schemes->image = $data['image'];
        $schemes->save();
        return redirect('/schemes');
    }

    public function update()
    {
        $data = request()->all();
        $schemes = Scheme::find($data['id']);
        $schemes->title = $data['title'];
        $schemes->image = $data['image'];
        $schemes->save();
        return redirect('/schemes');
    }
}
