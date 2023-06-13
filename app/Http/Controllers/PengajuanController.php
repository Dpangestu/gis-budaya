<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanModel;
use App\Models\SeniModel;
use App\Models\BudayaModel;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    public function index (){
        $pengajuans = PengajuanModel::all();

        
        return view('pages.pengajuan.Pengajuan',[
            'titel' => 'Pengajuan Data',
            'pengajuans' => $pengajuans,
        ]);
    }
    
    public function pengajuanK (){
        $pengajuans = PengajuanModel::all();
        
        return view('pages.pengajuan.peng-Kontributor',[
            'titel' => 'Pengajuan Data Kontributor',
            'pengajuans' => $pengajuans
        ]);
    }
     public function create()
    { 
        return view('pages.pengajuan.add-pengajuan', [
            'titel' => 'Ajukan',
            'pengajuans' => PengajuanModel::all(),
        ]);
    }
    public function store (Request $request){
        try { // Validasi input dari request jika diperlukan
        
            $validatedData = $request->validate([
                'nama_data' => 'required|max:30',
                'jenis_data' => 'required',
                'deskripsi' => 'required',
                'pengelola' => 'required|max:60',
                'kategori' => 'required|max:20',
                'foto' => 'required|max:20',
                'htm' => 'required|integer',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            PengajuanModel::create($validatedData);

            return redirect('/pengajuanK')->with('success', 'Data Berhasil Diajukan!');
            } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
        // Buat entitas Pengajuan baru dengan data yang valid
        // PengajuanModel::create($validatedData);

        // return redirect('/pengajuanK')->with('success', 'Data Berhasil Diajukan!');
    }


    // fungsi button
    public function approve($id)
    {
        // Logika untuk menyetujui pengajuan dengan ID tertentu
        $pengajuans = PengajuanModel::find($id);
        $pengajuans->status = 'approved';
        $pengajuans->save();

        if ($pengajuans->jenis_data == 'seni') {
            SeniModel::insert([
                'nama_seni'     => $pengajuans->nama_data,
                'deskripsi'     => $pengajuans->deskripsi,
                'pengelola'     => $pengajuans->pengelola,
                'kategori'      => $pengajuans->kategori,
                'foto'          => $pengajuans->foto,
                'htm'           => $pengajuans->htm,
                'latitude'      => $pengajuans->latitude,
                'longitude'     => $pengajuans->longitude,
        ]);
        } elseif ($pengajuans->jenis_data == 'budaya') {
            BudayaModel::insert([
                'nama_budaya'   => $pengajuans->nama_data,
                'deskripsi'     => $pengajuans->deskripsi,
                'pengelola'     => $pengajuans->pengelola,
                'kategori'      => $pengajuans->kategori,
                'foto'          => $pengajuans->foto,
                'htm'           => $pengajuans->htm,
                'latitude'      => $pengajuans->latitude,
                'longitude'     => $pengajuans->longitude,
            ]);
        }
        return redirect()->back()->with('success', 'Pengajuan telah disetujui!');
    }

    public function reject($id)
    {
        // Logika untuk menolak pengajuan dengan ID tertentu
        $pengajuans = PengajuanModel::find($id);
        $pengajuans->status = 'rejected';
        $pengajuans->save();
        // ...
        return redirect()->back()->with('success', 'Pengajuan telah ditolak!');
    }
}