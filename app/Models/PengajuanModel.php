<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanModel extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';

    protected $fillable = [
        'jenis_data',
        'nama_data',
        'deskripsi',
        'pengelola',
        'kategori',
        'foto',
        'htm',
        'latitude',
        'longitude',
        'status'
    ];

    // protected $casts = [
    //     'jenis_data' => 'string' // Menambahkan casting untuk jenis_data agar disimpan sebagai string
    // ];
}