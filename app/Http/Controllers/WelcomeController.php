<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jasa;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $searchBarang = $request->input('search_barang');
        $searchJasa = $request->input('search_jasa');

        $barangs = Barang::when($searchBarang, function($query) use ($searchBarang) {
            return $query->where('name', 'like', '%' . $searchBarang . '%');
        })->paginate(10);

        $jasas = Jasa::when($searchJasa, function($query) use ($searchJasa) {
            return $query->where('name', 'like', '%' . $searchJasa . '%');
        })->paginate(10);

        return view('welcome', compact('barangs', 'jasas', 'searchBarang', 'searchJasa'));
    }
} 