<?php

namespace App\Http\Controllers;

use App\Models\BudayaModel;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    public function index (){
        
        return view('pages.budaya', [
            'titel'     => 'Budaya',
            'budayas'   => BudayaModel::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input dari request jika diperlukan
        $validatedData = $request->validate([
            'nama_budaya' => 'required|max:30',
            'deskripsi' => 'required',
            'pengelola' => 'required|max:60',
            'kategori' => 'required|max:20',
            'foto' => 'required|max:20',
            'htm' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Buat entitas Budaya baru dengan data yang valid
        BudayaModel::create($validatedData);

        return redirect('/budaya')->with('success', 'Data Budaya Berhasil Disimpan!');
    }
}
