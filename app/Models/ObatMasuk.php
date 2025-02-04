<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_obat_masuk',
        'kode_obat',
        'nama_obat',
        'jumlah',
        'satuan',
        'tanggal_kadaluarsa',
        'tanggal_obat_masuk',
    ];
}
