<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalModel;
use App\Models\SeniModel;
use App\Models\BudayaModel;

class JadwalController extends Controller
{
    public function index (){
        $jadwals = JadwalModel::all();
        $dataSeni = SeniModel::select('id_seni', 'nama_seni')->get();
        $dataBudaya = BudayaModel::select('id_budaya', 'nama_budaya')->get();

        return view('pages.jadwal.index',[
            'titel'     => 'Jadwal Event',
            'jadwals' => $jadwals,
            'dataSeni' => $dataSeni,
            'dataBudaya' => $dataBudaya,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input dari request jika diperlukan
        $validatedData = $request->validate([
        'nama_acara' => 'required|max:30',
        'id_seni' => 'nullable|required_without:id_budaya',
        'id_budaya' => 'nullable|required_without:id_seni',
        'deskripsi' => 'required|max:255',
        'warna_acara' => 'required',
        'mulai_acara' => 'required',
        'akhir_acara' => 'required',
    ]);

    if ($request->has('seniCheckbox')) {
        $validatedData['id_seni'] = $request->input('id_seni');
        $validatedData['id_budaya'] = null;
    } elseif ($request->has('budayaCheckbox')) {
        $validatedData['id_seni'] = null;
        $validatedData['id_budaya'] = $request->input('id_budaya');
    } else {
        // If neither checkbox is selected, remove the validation rules for id_seni and id_budaya
        unset($validatedData['id_seni']);
        unset($validatedData['id_budaya']);
    }
        JadwalModel::create($validatedData);

        return redirect('/jadwal')->with('success', 'Jadwal Berhasil Disimpan!');
    }
    
    public function search(Request $request)
    {
        $searchText = $request->input('search_text');

        $jadwals = JadwalModel::where('nama_event', 'LIKE', "%$searchText%")
            ->orWhere('pengelola', 'LIKE', "%$searchText%")
            ->orWhere('kategori', 'LIKE', "%$searchText%")
            ->get();

        return view('pages.budaya.budaya', [
            'titel'     => 'Budaya',
            'jadwals'   => $jadwals,
        ]);
    }

    public function events()
    {
        $jadwals = JadwalModel::all();

        $events = [];
        foreach ($jadwals as $jadwal) {
            $events[] = [
                'title' => $jadwal->nama_acara,
                'start' => $jadwal->mulai_acara,
                'end' => $jadwal->akhir_acara,
                'backgroundColor' => $jadwal->warna_acara,
                'borderColor' => $jadwal->warna_acara,
                'allDay' => true,
            ];
        }

        return response()->json($events);
    }

    public function destroy ($id)
    {
        JadwalModel::where('id_jadwal', $id)->delete();

        return redirect('/jadwal')->with('success', 'Jadwal Berhasil Dihapus!');
    }
}