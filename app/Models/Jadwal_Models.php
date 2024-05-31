<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Models extends Model
{
    use HasFactory;
    protected $table = 'tb_jadwal';
    protected $fillable = [
        'pkl_id',
        'tanggal',
        'jam',

    ];

    public function pkl()
    {
        return $this->belongsTo(PKL_Models::class, 'pkl_id');
    }
}
