<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function edit($id)
    {
        $transport = Transport::find($id);
        return view('transport.edit', compact('transport'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
        ]);

        $data = request()->all();
        $transport = Transport::find($data['id']);
        $transport->text = $data['text'];
        $transport->save();
        return redirect('/transports/1/edit');
    }
}
