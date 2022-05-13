<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function index()
    {
        // $partners = DB::select("SELECT * FROM `partners` ORDER BY id ");
        $response = file_get_contents('https://servisno.herokuapp.com/api/patners');
        $patners = json_decode($response)->data;
        return view('back.partner.index', ['partners' => $patners]);
    }

    public function create()
    {
        return view('back.partner.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'email' => 'required',
            'ket' => '',
        ]);

        Partner::create($validateData);

        return redirect()->route('partner.index')->with(['sukses' => 'Data Berhasil tersimpan']);
    }

    public function edit($id)
    {
        $partner = Partner::find($id);
        return view('back.partner.edit', ['partner' => $partner]);
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::find($id);
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'email' => 'required',
            'ket' => '',
        ]);

        $partner->update($validateData);

        return redirect()->route('partner.index');
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        return redirect()->route('partner.index')->with(['sukses' => 'Data Berhasil Dihapus']);
    }
}
