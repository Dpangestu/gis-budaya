<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniModel extends Model
{
    use HasFactory;

    protected $table = 'seni';
    protected $primaryKey = 'id_budaya';

    protected $fillable = [
        'nama_seni',
        'deskripsi',
        'pengelola',
        'kategori',
        'foto',
        'htm',
        'latitude',
        'longitude'
    ];
}