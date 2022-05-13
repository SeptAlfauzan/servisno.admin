<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $orders = DB::select("SELECT * FROM `orders` ORDER BY id ");
        return view('back.order.index',['orders' => $orders]);
    }

    public function create(){
        return view('back.order.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);

        Order::create($validateData);
        
        return redirect()->route('order.index')->with(['sukses' => 'Data Berhasil tersimpan']);
    }

    public function edit($id){
        $order = Order::find($id);
        return view('back.order.edit', ['order' => $order]);
    }

    public function update(Request $request, $id){
        $order = Order::find($id);
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:100',
        ]);

        $order->update($validateData);

        return redirect()->route('order.index');
    }

    public function destroy($id){
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('order.index')->with(['sukses' => 'Data Berhasil Dihapus']);
    }
}
