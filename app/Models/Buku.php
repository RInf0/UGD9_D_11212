<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'id_buku',
        'judul',
        'penulis',
        'id_penerbit',
        'status',
    ];

    public function buku(){
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
