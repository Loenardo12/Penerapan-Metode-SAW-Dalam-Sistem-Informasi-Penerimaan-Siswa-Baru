<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $fillable = [
        'ID_CALON',
        'tanggal_pinjaman',
        'besar_pinjaman',
        'bunga',
        'angsuran',
        'jangka_waktu'
    ];
}
