<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_resep',
        'deskripsi',
        'foto_resep',
        'jenis_resep',
        'bahan',
        'cara_masak',
    ];
}