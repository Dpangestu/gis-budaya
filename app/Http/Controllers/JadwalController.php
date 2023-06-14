<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalModel;

class JadwalController extends Controller
{
    public function index (){
        $Jadwals = JadwalModel::all();

        return view('pages.jadwal.index',[
            'titel'     => 'Jadwal Event',
            'jadwals' => $Jadwals
        ]);
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
}