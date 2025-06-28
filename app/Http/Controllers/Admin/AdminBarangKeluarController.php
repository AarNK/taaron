<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BarangKeluarImport;

class AdminBarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_keluars = BarangKeluar::orderBy('created_at', 'desc')->get();
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
            'stokkurang' => 'required|integer|min:0',
        ]);

        $barangKeluar = BarangKeluar::create([
            'barang_id' => $request->barang_id,
            'stokkurang' => $request->stokkurang,
        ]);

        $laporan = Laporan::where('barang_id', $request->barang_id)->orderBy('created_at', 'desc')->firstOrFail();
        $stokAkhirBaru = $laporan->stokakhir - $request->stokkurang;
        $laporan->update([
            'stokkurang' => $laporan->stokkurang + $request->stokkurang,
            'stokakhir' => $stokAkhirBaru
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
            'stokkurang' => 'required|integer|min:0',
        ]);

        $barangKeluar = BarangKeluar::findOrFail($id);

        $laporan = Laporan::where('barang_id', $request->barang_id)->orderBy('created_at', 'desc')->firstOrFail();
        $stokAkhirBaru = $laporan->stokakhir + $barangKeluar->stokkurang - $request->stokkurang;

        $barangKeluar->update([
            'barang_id' => $request->barang_id,
            'stokkurang' => $request->stokkurang,
        ]);

        $laporan->update([
            'stokkurang' => $laporan->stokkurang - $barangKeluar->stokkurang + $request->stokkurang,
            'stokakhir' => $stokAkhirBaru
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

    /**
     * Import barang keluar from Excel.
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new BarangKeluarImport, $request->file('file'));

        return redirect()->back();
    }
}
