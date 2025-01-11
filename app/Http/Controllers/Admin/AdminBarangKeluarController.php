<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class AdminBarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_keluars = BarangKeluar::all();
        $barangs = Barang::all();
        return view('admin.barangkeluar.index', compact('barang_keluars', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|max:100',
            'stokawal' => 'required|integer|min:0',
            'stokkurang' => 'required|integer|min:0',
        ]);

        BarangKeluar::create([
            'barang_id' => $request->barang_id,
            'stokawal' => $request->stokawal,
            'stokkurang' => $request->stokkurang,
            'stokakhir' => $request->stokawal - $request->stokkurang,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_id' => 'required|max:100',
            'stokawal' => 'required|integer|min:0',
            'stokkurang' => 'required|integer|min:0',
        ]);

        $barangKeluar = BarangKeluar::findOrFail($id);

        $barangKeluar->update([
            'barang_id' => $request->barang_id,
            'stokawal' => $request->stokawal,
            'stokkurang' => $request->stokkurang,
            'stokakhir' => $request->stokawal - $request->stokkurang,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);

        $barangKeluar->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
