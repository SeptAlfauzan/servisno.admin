<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PenggunaController extends Controller
{
    public function index()
    {
        // $penggunas = DB::select("SELECT * FROM `penggunas` ORDER BY id ");
        $response = file_get_contents('https://servisno.herokuapp.com/api/users');
        $penggunas = json_decode($response)->data;
        return view('back.pengguna.index', ['penggunas' => $penggunas]);
    }

    public function update($username, $email, $verificationCode)
    {
        echo $username;
    }

    public function create()
    {
        return view('back.pengguna.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
        ]);

        Pengguna::create($validateData);

        return redirect()->route('pengguna.index')->with(['sukses' => 'Data Berhasil tersimpan']);
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with(['sukses' => 'Data Berhasil Dihapus']);
    }
}
