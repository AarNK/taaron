<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Satuan;
use Illuminate\Http\Request;

class AdminSatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuans = Satuan::all();
        return view('admin.satuan.index', compact('satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Satuan::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Satuan berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $satuan = Satuan::findOrFail($id);

        $satuan->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Satuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $satuan = Satuan::findOrFail($id);

        $satuan->delete();

        return redirect()->back()->with('success', 'Satuan berhasil dihapus.');
    }
}
