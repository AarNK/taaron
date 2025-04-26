<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BarangMasukImport;

class AdminBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_masuks = BarangMasuk::orderBy('created_at', 'desc')->get();
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
            'stoktambah' => 'required|integer|min:0',
        ]);

        $barangMasuk = BarangMasuk::create([
            'barang_id' => $request->barang_id,
            'stoktambah' => $request->stoktambah,
        ]);

        $laporan = Laporan::where('barang_id', $request->barang_id)->orderBy('created_at', 'desc')->first();
        if ($laporan) {
            $laporan->update([
                'stokawal' => $laporan->stokakhir,
                'stoktambah' => $request->stoktambah,
                'stokakhir' => $laporan->stokakhir + $request->stoktambah
            ]);
        } else {
            Laporan::create([
                'barang_id' => $request->barang_id,
                'stokawal' => 0,
                'stoktambah' => $request->stoktambah,
                'stokkurang' => 0,
                'stokakhir' => $request->stoktambah
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_id' => 'required|max:100',
            'stoktambah' => 'required|integer|min:0',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);

        $laporan = Laporan::where('barang_id', $request->barang_id)->orderBy('created_at', 'desc')->firstOrFail();
        $stokAkhirBaru = $laporan->stokakhir - $barangMasuk->stoktambah + $request->stoktambah;

        $barangMasuk->update([
            'barang_id' => $request->barang_id,
            'stoktambah' => $request->stoktambah,
        ]);

        $laporan->update([
            'stoktambah' => $request->stoktambah,
            'stokakhir' => $stokAkhirBaru
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

    /**
     * Import barang masuk from Excel.
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new BarangMasukImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data berhasil diimpor dari Excel.');
    }
}
