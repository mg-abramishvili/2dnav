<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\MarkImage;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('store.routes')->get();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $markimages = MarkImage::all();
        return view('tags.create', compact('markimages'));
    }

    public function edit($id)
    {
        $tags = Tag::find($id);
        $markimages = MarkImage::all();
        return view('tags.edit', compact('tags', 'markimages'));


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

    public function store(Request $request)
    {
        $data = request()->all();
        $tags = new Tag();
        $tags->title = $data['title'];
        $tags->save();
        $tags->markimages()->attach($request->markimages, ['tag_id' => $tags->id]);
        return redirect('/tags');
    }

    public function update(Request $request)
    {
        $data = request()->all();
        $tags = Tag::find($data['id']);
        $tags->title = $data['title'];
        $tags->save();
        $tags->markimages()->detach();
        $tags->markimages()->attach($request->markimages, ['tag_id' => $tags->id]);
        return redirect('/tags');
    }
}
