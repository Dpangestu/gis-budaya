<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeniController extends Controller
{
    public function index (){
        return view('pages/seni', [
            'titel'     => 'Seni',
        ]);
    }
}
