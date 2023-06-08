<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistController extends Controller
{
    public function index(){
        
        return view('auth.regist',[
            'titel' => 'Registrasi',
        ]);

    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|max:16',
            'username' => 'required|max:16',
            'email' => 'required|email:dns',
            'password' => 'required|max:8',
        ]);


        $validatedData['password'] = bcrypt($validatedData['password']);

        // Simpan registrasi
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil! Silahkan Login');
    }
}