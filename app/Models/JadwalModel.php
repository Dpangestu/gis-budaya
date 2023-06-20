<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalModel extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'nama_acara',
        'deskripsi',
        'id_seni',
        'id_budaya',
        'mulai_acara',
        'akhir_acara',
        'warna_acara'
        // 'latitude',
        // 'longitude'
    ];

    public function seni()
    {
        return $this->belongsTo(SeniModel::class, 'id_seni');
    }

    public function budaya()
    {
        return $this->belongsTo(BudayaModel::class, 'id_budaya');
    }
    
}