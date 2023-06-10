<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BudayaModel;

class LandingController extends Controller
{
    public function index (){
        
        $budayas = BudayaModel::count();
        // $senis = SeniModel::count();

        // $coordinates = $budayas->map(function ($budaya) {
        //     return [
        //         'latitude' => $budaya->latitude,
        //         'longitude' => $budaya->longitude,
        //     ];
        // });

        return view('landingpage', [
            'titel'     => 'Selamat Datang',
            'budayas'   => $budayas,
            // 'coordinates'=> $coordinates,
        ]);
    }
}