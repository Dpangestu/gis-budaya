<?php

namespace App\Http\Controllers;

use App\Models\BudayaModel;
use App\Models\SeniModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index (){
        
        // $name = null;

        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $name = $user->name;
        // }

        $budayas = BudayaModel::count();
        $senis = SeniModel::count();
        $pengajuans = PengajuanModel::count();

        return view('dashboard', [
            'titel'     => 'Dashboard',
            'budayas'   => $budayas,
            'senis'   => $senis,
            'pengajuans'   => $pengajuans,
            // 'name'      => $name
        ]);
    }
}