<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;
    protected $table = 'tb_calon_siswa';
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'jenis_kelamin',
        'city'
    ];
}
