<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_obat_keluar',
        'kode_obat',
        'nama_obat',
        'jumlah',
        'satuan',
        'tanggal_kadaluarsa',
        'tanggal_distribusi',
        'tujuan',
        'id_tempat'
    ];

    public function tempats()
    {
        return $this->belongsTo(Tempat::class, 'id_tempat', 'id');
    }
}
