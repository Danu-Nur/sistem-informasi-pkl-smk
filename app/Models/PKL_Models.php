<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKL_Models extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pkl',
        'Alamat_pkl',
        'lokasi_pkl',
        'siswa_id',
        'psekolah_id',
        'pindustri_id',

    ];
}
