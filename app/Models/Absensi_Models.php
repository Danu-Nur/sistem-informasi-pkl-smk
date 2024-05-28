<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi_Models extends Model
{
    use HasFactory;

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
}
