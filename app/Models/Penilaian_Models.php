<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian_Models extends Model
{
    use HasFactory;

    protected $table = 'tb_penilaian';
    protected $fillable = [
        'siswa_id',
        'kegiatan_id',
        'nilai_pkl',
        'nilai_sikap',
        'keterangan',

    ];
}
