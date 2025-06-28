<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JasaImport;


class AdminJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jasas = Jasa::all();
        return view('admin.jasa.index', compact('jasas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'harga' => 'required|numeric',
        ]);

        Jasa::create([
            'name' => $request->name,
            'harga' => $request->harga,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'harga' => 'required|numeric',
        ]);

        $jasa = Jasa::findOrFail($id);

        $jasa->update([
            'name' => $request->name,
            'harga' => $request->harga,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jasa = Jasa::findOrFail($id);

        $jasa->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Import jasa from Excel.
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new JasaImport, $request->file('file'));

        return redirect()->back();
    }
} 