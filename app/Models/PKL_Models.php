<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKL_Models extends Model
{
    use HasFactory;

    protected $table = 'tb_pkl';
    protected $fillable = [
        'nama_pkl',
        'alamat_pkl',
        'lokasi_pkl',
        'siswa_id',
        'psekolah_id',
        'pindustri_id',

    ];

    public function pembimbingSekolah()
    {
        return $this->belongsTo(User::class, 'psekolah_id');
    }

    public function pembimbingIndustri()
    {
        return $this->belongsTo(User::class, 'pindustri_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa_Models::class, 'siswa_id');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal_Models::class, 'pkl_id');
    }
}
