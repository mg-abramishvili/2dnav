<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scheme;
use App\Models\Mark;
use App\Models\MarkImage;

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
        $markimages = MarkImage::all();
        return view('marks.create', compact('schemes', 'markimages'));
    }

    public function edit($id)
    {

        $marks = Mark::find($id);

        return view('marks.edit', compact('marks'));


    }

    public function delete($id)
    {
        $marks = Mark::find($id);
        $marks->delete();
        return redirect('/marks');
    }

    public function store(Request $request)
    {
        $data = request()->all();
        $marks = new Mark();
        $marks->title = $data['title'];
        $marks->scheme_id = $data['scheme_id'];
        $marks->x_01 = $data['x_01'];
        $marks->y_01 = $data['y_01'];
        $marks->save();
        $marks->markimages()->attach($request->markimages, ['mark_id' => $marks->id]);
        return redirect('/marks');
    }

    public function update(Request $request)
    {
        $data = request()->all();
        $marks = Mark::find($data['id']);
        $marks->title = $data['title'];
        $marks->scheme_id = $data['scheme_id'];
        $marks->x_01 = $data['x_01'];
        $marks->y_01 = $data['y_01'];
        $marks->save();
        $marks->markimages()->detach();
        $marks->markimages()->attach($request->markimages, ['mark_id' => $marks->id]);
        return redirect('/marks');
    }
}
