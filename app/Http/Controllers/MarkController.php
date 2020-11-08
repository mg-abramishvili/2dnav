<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scheme;
use App\Models\Mark;

class MarkController extends Controller
{
    public function index()
    {
        $marks = Mark::get();
        return view('marks.index', compact('marks'));
    }

    public function create()
    {
        $schemes = Scheme::get();
        return view('marks.create', compact('schemes'));
    }

    public function edit($id)
    {

        $marks = Mark::find($id);

        return view('marks.edit', compact('marks'));


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

        if (request()->file('icon')) {
            $file = request()->file('icon');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }

    }

    public function delete($id)
    {
        $marks = Mark::find($id);
        $marks->delete();
        return redirect('/marks');
    }

    public function store()
    {
        $data = request()->all();
        $marks = new Mark();
        $marks->title = $data['title'];
        $marks->scheme_id = $data['scheme_id'];
        $marks->x_01 = $data['x_01'];
        $marks->y_01 = $data['y_01'];
        $marks->icon = $data['icon'];
        $marks->save();
        return redirect('/marks');
    }

    public function update()
    {
        $data = request()->all();
        $marks = Mark::find($data['id']);
        $marks->title = $data['title'];
        $marks->scheme_id = $data['scheme_id'];
        $marks->x_01 = $data['x_01'];
        $marks->y_01 = $data['y_01'];
        $marks->icon = $data['icon'];
        $marks->save();
        return redirect('/marks');
    }
}
