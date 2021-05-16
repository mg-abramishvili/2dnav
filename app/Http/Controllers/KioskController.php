<?php

namespace App\Http\Controllers;

use App\Models\Kiosk;
use App\Models\Scheme;
use Illuminate\Http\Request;

class KioskController extends Controller
{
    public function index()
    {
        $kiosks = Kiosk::all();
        return view('kiosks.index', compact('kiosks'));
    }

    public function create()
    {
        $schemes = Scheme::all();
        return view('kiosks.create', compact('schemes'));
    }

    public function edit($id)
    {

        $kiosks = Kiosk::find($id);
        $schemes = Scheme::all();
        return view('kiosks.edit', compact('kiosks', 'schemes'));
    }

    public function delete($id)
    {
        $kiosks = Kiosk::find($id);
        $kiosks->delete();
        $kiosks->schemes()->detach();
        return redirect('/kiosks');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kiosk' => 'required',
            'schemes' => 'required',
            'x' => 'required',
            'y' => 'required',
        ]);

        $data = request()->all();
        $kiosks = new Kiosk();
        $kiosks->kiosk = $data['kiosk'];
        $kiosks->x = $data['x'];
        $kiosks->y = $data['y'];
        $kiosks->save();
        $kiosks->schemes()->attach($request->schemes, ['kiosk_id' => $kiosks->id]);
        return redirect('/kiosks');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'kiosk' => 'required',
            'schemes' => 'required',
            'x' => 'required',
            'y' => 'required',
        ]);
        
        $data = request()->all();
        $kiosks = Kiosk::find($data['id']);
        $kiosks->kiosk = $data['kiosk'];
        $kiosks->x = $data['x'];
        $kiosks->y = $data['y'];
        $kiosks->save();
        $kiosks->schemes()->detach();
        $kiosks->schemes()->attach($request->schemes, ['kiosk_id' => $kiosks->id]);
        return redirect('/kiosks');
    }
}
