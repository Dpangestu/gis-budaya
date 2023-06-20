<?php

namespace App\Http\Controllers;

use App\Models\SeniModel;
use App\Models\JadwalModel;
use Illuminate\Http\Request;

class SeniController extends Controller
{
    public function index ()
    {
        $senis = SeniModel::all();
        $coordinates = $senis->map(function ($seni) {
            return [
                'latitude' => $seni->latitude,
                'longitude' => $seni->longitude,
            ];
        });

        return view('pages.seni.seni', [
            'titel'     => 'Seni',
            'senis'   => $senis,
            'coordinates'=> $coordinates,
        ]);
    }

    public function create()
    {
        return view('pages.seni.add-seni', [
            'titel'     => 'Tambah Seni',
            'senis'   => SeniModel::all()
        ]);
    }

    public function store (Request $request)
    {
         $validatedData = $request->validate([
            'nama_seni' => 'required|max:30',
            'deskripsi' => 'required',
            'pengelola' => 'required|max:60',
            'kategori' => 'required|max:20',
            'foto' => 'required|max:20',
            'htm' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Buat entitas Seni baru dengan data yang valid
        SeniModel::create($validatedData);

        return redirect('/seni')->with('success', 'Data Seni Berhasil Disimpan!');
    }
    
    public function show($id)
    {
        return view('pages.seni.detail-seni', [
            'titel' => 'Detail Seni',
            'seni' => SeniModel::findOrFail($id),
        ]);
    }
    public function edit($id)
    {
        return view('pages.seni.edit-seni',[
            'titel'  => 'Edit Seni',
            'seni'   => SeniModel::findOrFail($id)
        ]);

    }

    public function update(Request $request, $id)
    {
        // Validasi input dari request jika diperlukan
        $validatedData = $request->validate([
            'nama_seni' => 'required|max:30',
            'deskripsi' => 'required',
            'pengelola' => 'required|max:60',
            'kategori' => 'required|max:20',
            'foto' => 'required|max:20',
            'htm' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $seni = SeniModel::find($id);
    
        if (!$seni) {
            return redirect('/seni')->with('error', 'Data Seni Tidak Ditemukan!');
        }
        
        $seni->update($validatedData);

        return redirect('/seni')->with('success', 'Data Seni Berhasil Diperbarui!');
    }

    public function destroy ($id)
    {
        SeniModel::where('id_seni', $id)->delete();

        return redirect('/seni')->with('success', 'Data Seni Berhasil Dihapus!');
    }

    public function search(Request $request)
    {
        $searchText = $request->input('search_text');

        $senis = SeniModel::where('nama_seni', 'LIKE', "%$searchText%")
            ->orWhere('pengelola', 'LIKE', "%$searchText%")
            ->orWhere('kategori', 'LIKE', "%$searchText%")
            ->get();

        return view('pages.seni.seni', [
            'titel' => 'Seni',
            'senis' => $senis,
        ]);
    }

}