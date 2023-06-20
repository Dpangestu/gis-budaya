<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudayaModel extends Model
{
    use HasFactory;

    protected $table = 'budaya';
    protected $primaryKey = 'id_budaya';

    protected $fillable = [
        'nama_budaya',
        'deskripsi',
        'pengelola',
        'kategori',
        'foto',
        'htm',
        'latitude',
        'longitude'
    ];

    public function createdBy()
    {
        // return $this->belongsTo(User::class, 'created_by');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalModel::class);
    }
}