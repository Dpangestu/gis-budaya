<?php

namespace App\Http\Controllers;

use App\Models\BudayaModel;
// use App\Models\SeniModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        
        $budayas = BudayaModel::count();
        // $senis = SeniModel::count();

        return view('dashboard', [
            'titel'     => 'Dashboard',
            'budayas'   => $budayas,
        ]);
    }
}