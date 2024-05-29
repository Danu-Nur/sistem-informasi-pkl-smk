<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa_Models extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'nomor_induk',
        'alamat',
        'email',
        'telp',
        'kelas',
        'jurusan',
        'username',
        'password',
    ];
}