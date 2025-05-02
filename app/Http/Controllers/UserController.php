<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        $barangs = Barang::all(); // Ambil semua barang
        return view('user.main', compact('barangs'));
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:md_barang,kode_barang',
            'kategori_barang' => 'required',
            'lokas_barang' => 'required',
            'stock_barang' => 'required|integer',
            'satuan_barang' => 'required',
        ]);        

        Barang::create($request->all());
        return redirect('/dashboard')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan form untuk update barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('user.edit', compact('barang'));
    }

    // Mengupdate barang
    public function update(Request $request, $id)
    {
        
        $barang = Barang::findOrFail($id);

            // Update data barang
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'kode_barang' => $request->kode_barang,
                'kategori_barang' => $request->kategori_barang,
                'lokas_barang' => $request->lokas_barang,
                'stock_barang' => $request->stock_barang,
                'satuan_barang' => $request->satuan_barang,
            ]);

            // Redirect kembali dengan pesan sukses
            return redirect('/dashboard')->with('success', 'Data berhasil diupdate');
    }

    // Menghapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

}
