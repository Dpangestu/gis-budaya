<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index (){
        return view('pages.komentar.komentar',[
            'titel' => 'Komentar',
        ]);
    }
}