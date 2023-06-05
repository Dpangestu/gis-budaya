<?php

namespace App\Http\Controllers;

// use App\Models\BudayaModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        
        return view('dashboard', [
            'titel'     => 'Dashboard',
        ]);
    }
}