<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan_Models extends Model
{
    use HasFactory;

    protected $table = 'tb_kegiatan';
    protected $fillable = [
        'pkl_id',
        'siswa_id',
        'jadwal_id',
        'absensi_id',
        'dokumentasi',
        'keterangan',

    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa_Models::class, 'siswa_id');
    }

    public function pkl()
    {
        return $this->belongsTo(PKL_Models::class, 'pkl_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal_Models::class, 'jadwal_id');
    }

    public function absensi()
    {
        return $this->belongsTo(Absensi_Models::class, 'absensi_id');
    }
}
