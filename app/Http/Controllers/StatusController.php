<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index()
    {
        // $statuses = DB::select("SELECT * FROM `statuses` ORDER BY id ");
        $response = file_get_contents('https://servisno.herokuapp.com/api/order-status');
        $statuses = json_decode($response)->data;
        return view('back.status.index', ['statuses' => $statuses]);
    }

    public function create()
    {
        return view('back.status.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);

        Status::create($validateData);

        return redirect()->route('status.index')->with(['sukses' => 'Data Berhasil tersimpan']);
    }

    public function edit($id)
    {
        $status = Status::find($id);
        return view('back.status.edit', ['status' => $status]);
    }

    public function update(Request $request, $id)
    {
        $status = Status::find($id);
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);

        $status->update($validateData);

        return redirect()->route('status.index');
    }

    public function destroy($id)
    {
        $status = Status::find($id);
        $status->delete();
        return redirect()->route('status.index')->with(['sukses' => 'Data Berhasil Dihapus']);
    }
}
