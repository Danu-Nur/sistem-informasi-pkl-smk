<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa_Models extends Model
{
    use HasFactory;

    protected $table = 'tb_siswa';
    protected $fillable = [
        'user_id',
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

    public function pkls()
    {
        return $this->hasMany(PKL_Models::class);
    }
}
