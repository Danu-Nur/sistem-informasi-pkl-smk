<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi_Models extends Model
{
    use HasFactory;

    protected $table = 'tb_absensi';
    protected $fillable = [
        'siswa_id',
        'pkl_id',
        'jadwal_id',
        'waktu_absen',
        'status_absen',
        'latitude',
        'longitude',
        'lokasi_absen',

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
}
