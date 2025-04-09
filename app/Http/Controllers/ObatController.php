<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // menampilkan semua data obat
    // menambah obat
    // update obat
    // hapus obat
    public function index(){
        // ambil semua data dan ditampilkan
        $obats = Obat::all();
        return view('dokter.obat.index', compact('obats'));
    }

    public function store(Request $request){
        // request akan membawa data dari form yang ada di frontend blade
        $request->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'required|string',
            'harga' => 'required|integer'
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga
        ]);

        return redirect()->back();
    }

    // return ke halaman edit berisikan form dan isi datanya
    public function edit($id){
        // find == ambil 1 data dari id nya
        $obat = Obat::find($id);
        return view('dokter.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_obat' => 'required|string',
            'kemasan' => 'required|string',
            'harga' => 'required|integer'
        ]);

        $obat = Obat::find($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga
        ]);

        return redirect()->route('dokter.obat');
        // return redirect()->url('/dokter/obat');
    }

    public function delete($id){
        $obat = Obat::find($id);
        $obat->delete();

        return redirect()->back();
    }
}
