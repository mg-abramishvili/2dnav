<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarkImage;

class MarkImageController extends Controller
{
    public function index()
    {
        $markimages = MarkImage::get();
        return view('markimages.index', compact('markimages'));
    }

    public function create()
    {
        return view('markimages.create');
    }

    public function edit($id)
    {

        $markimages = MarkImage::find($id);

        return view('markimages.edit', compact('markimages'));


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
        $markimages = MarkImage::find($id);
        $markimages->delete();
        return redirect('/markimages');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);

        $data = request()->all();
        $markimages = new MarkImage();
        $markimages->title = basename($data['image']);
        $markimages->image = $data['image'];
        $markimages->save();
        return redirect('/markimages');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);

        $data = request()->all();
        $markimages = MarkImage::find($data['id']);
        $markimages->title = $data['title'];
        $markimages->image = $data['image'];
        $markimages->save();
        return redirect('/markimages');
    }
}
