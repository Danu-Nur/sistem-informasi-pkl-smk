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

    public function siswa()
    {
        return $this->belongsTo(Siswa_Models::class, 'siswa_id');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan_Models::class, 'kegiatan_id');
    }
}
