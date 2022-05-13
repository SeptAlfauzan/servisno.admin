<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gadget;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class GadgetController extends Controller
{
    public function index(){
        $gadgets = DB::select("SELECT * FROM `gadgets` ORDER BY id ");
        return view('back.gadget.index',['gadgets' => $gadgets]);
    }

    public function create(){
        return view('back.gadget.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'ket' => '',
        ]);

        Gadget::create($validateData);
        
        return redirect()->route('gadget.index')->with(['sukses' => 'Data Berhasil tersimpan']);
    }

    public function edit($id){
        $gadget = Gadget::find($id);
        return view('back.gadget.edit', ['gadget' => $gadget]);
    }

    public function update(Request $request, $id){
        $gadget = Gadget::find($id);
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:100',
            'ket' => '',
        ]);

        $gadget->update($validateData);

        return redirect()->route('gadget.index');
    }

    public function destroy($id){
        $gadget = Gadget::find($id);
        $gadget->delete();
        return redirect()->route('gadget.index')->with(['sukses' => 'Data Berhasil Dihapus']);
    }
}
