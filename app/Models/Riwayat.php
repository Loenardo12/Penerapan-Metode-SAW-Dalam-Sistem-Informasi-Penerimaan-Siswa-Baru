<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pengajuan';
    protected $fillable = [
        'ID_CALON',
        'tanggal_pengajuan',
        'status_pengajuan',
    ];
}
