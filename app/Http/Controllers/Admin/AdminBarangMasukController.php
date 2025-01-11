<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class AdminBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_masuks = BarangMasuk::all();
        $barangs = Barang::all();
        return view('admin.barangmasuk.index', compact('barang_masuks', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|max:100',
            'stokawal' => 'required|integer|min:0',
            'stoktambah' => 'required|integer|min:0',
        ]);

        BarangMasuk::create([
            'barang_id' => $request->barang_id,
            'stokawal' => $request->stokawal,
            'stoktambah' => $request->stoktambah,
            'stokakhir' => $request->stokawal + $request->stoktambah,
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
            'stoktambah' => 'required|integer|min:0',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);

        $barangMasuk->update([
            'barang_id' => $request->barang_id,
            'stokawal' => $request->stokawal,
            'stoktambah' => $request->stoktambah,
            'stokakhir' => $request->stokawal + $request->stoktambah,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);

        $barangMasuk->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
