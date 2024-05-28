<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan_Models extends Model
{
    use HasFactory;

    protected $fillable = [
        'pkl_id',
        'siswa_id',
        'jadwal_id',
        'dokumentasi',
        'keterangan',

    ];
}
