<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Tag;
use App\Models\Scheme;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        //$stores = Store::all();
        $stores = Store::with('tags')->get();
        return view('stores.index', compact('stores'));
        //dd($stores);
    }

    public function create()
    {
        $tags = Tag::all();
        $schemes = Scheme::all();
        return view('stores.create', compact('tags', 'schemes'));
    }

    public function edit($id)
    {

        $stores = Store::find($id);
        $tags = Tag::all();
        $schemes = Scheme::all();
        return view('stores.edit', compact('stores', 'tags', 'schemes'));
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
        $stores = Store::find($id);
        $stores->delete();
        $stores->schemes()->detach();
        $stores->tags()->detach();
        return redirect('/stores');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'schemes' => 'required',
            'x_01' => 'required',
            'y_01' => 'required',
        ]);

        $data = request()->all();
        $stores = new Store();
        $stores->title = $data['title'];
        $stores->x_01 = $data['x_01'];
        $stores->y_01 = $data['y_01'];
        $stores->save();
        $stores->schemes()->attach($request->schemes, ['store_id' => $stores->id]);
        $stores->tags()->attach($request->tags, ['store_id' => $stores->id]);
        return redirect('/stores');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'schemes' => 'required',
            'x_01' => 'required',
            'y_01' => 'required',
        ]);
        
        $data = request()->all();
        $stores = Store::find($data['id']);
        $stores->title = $data['title'];
        $stores->x_01 = $data['x_01'];
        $stores->y_01 = $data['y_01'];
        $stores->save();
        $stores->schemes()->detach();
        $stores->schemes()->attach($request->schemes, ['store_id' => $stores->id]);
        $stores->tags()->detach();
        $stores->tags()->attach($request->tags, ['store_id' => $stores->id]);
        return redirect('/stores');
    }
}
