<?php

namespace App\Http\Controllers;

use App\Models\BudayaModel;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    public function index (){

        $budayas = BudayaModel::all();

         // Mengambil semua nilai latitude dan longitude dari budayas
        $coordinates = $budayas->map(function ($budaya) {
            return [
                'latitude' => $budaya->latitude,
                'longitude' => $budaya->longitude,
            ];
        });
        
        return view('pages.budaya.budaya', [
            'titel'     => 'Budaya',
            'budayas'   => $budayas,
            'coordinates'=> $coordinates,
        ]);
    }

    public function create()
    {
        return view('pages.budaya.add-budaya', [
            'titel'     => 'Tambah Budaya',
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

    public function edit($id)
    {
        return view('pages.budaya.edit-budaya',[
            'titel'     => 'Edit Budaya',
            'budaya'   => BudayaModel::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
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

        $budaya = BudayaModel::find($id);
    
        if (!$budaya) {
            return redirect('/budaya')->with('error', 'Data Budaya Tidak Ditemukan!');
        }
        
        $budaya->update($validatedData);

        return redirect('/budaya')->with('success', 'Data Budaya Berhasil Diperbarui!');
    }

    public function destroy ($id)
    {
        BudayaModel::where('id_budaya', $id)->delete();

        return redirect('/budaya')->with('success', 'Data Budaya Berhasil Dihapus!');
    }

    public function saveMarker(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Simpan data ke dalam database
        $budaya = new BudayaModel;
        $budaya->latitude = $latitude;
        $budaya->longitude = $longitude;
        // Lakukan pengisian data lainnya sesuai kebutuhan
        $budaya->save();

        return response()->json(['message' => 'Marker berhasil disimpan']);
    }
}