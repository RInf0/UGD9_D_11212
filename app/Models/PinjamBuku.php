<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamBuku extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pinjam_buku',
        'id_buku',
        'id_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function pinjamBuku(){
        return $this->belongsTo(PinjamBuku::class, 'id_buku');
    }
}
