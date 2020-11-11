<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setup;

class SetupController extends Controller
{
    public function index()
    {
        $setup = Setup::where('id', '1')->first();
        return view('setup.edit', compact('setup'));

    }

    public function update()
    {

        $data = request()->all();
        $setup = Setup::find($data['id']);
        $setup->color = $data['color'];
        $setup->save();
        return redirect('/setup');
    }
}
