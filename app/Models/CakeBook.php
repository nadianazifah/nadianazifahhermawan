<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakeBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_buku',
        'deskripsi',
        'foto_sampul',
        'file_pdf',
    ];
}