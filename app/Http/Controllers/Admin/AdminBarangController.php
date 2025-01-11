<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;

class AdminBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        $satuans = Satuan::all();
        $kategoris = Kategori::all();
        return view('admin.barang.index', compact('barangs', 'kategoris', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|max:100',
            'satuan_id' => 'required|max:100',
            'name' => 'required|max:100',
        ]);

        Barang::create([
            'kategori_id' => $request->kategori_id,
            'satuan_id' => $request->satuan_id,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_id' => 'required|max:100',
            'satuan_id' => 'required|max:100',
            'name' => 'required|max:100',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->update([
            'kategori_id' => $request->kategori_id,
            'satuan_id' => $request->satuan_id,
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
