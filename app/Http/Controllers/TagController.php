<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::get();
        return view('tags.index', compact('tags'));

    }

    public function create()
    {

        return view('tags.create');

    }

    public function edit($id)
    {

        $tags = Tag::find($id);

        return view('tags.edit', compact('tags'));


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
        $tags = Tag::find($id);
        $tags->delete();
        return redirect('/tags');
    }

    public function store()
    {
        $data = request()->all();
        $tags = new Tag();
        $tags->title = $data['title'];
        $tags->save();
        return redirect('/tags');
    }

    public function update()
    {
        $data = request()->all();
        $tags = Tag::find($data['id']);
        $tags->title = $data['title'];
        $tags->save();
        return redirect('/tags');
    }
}
