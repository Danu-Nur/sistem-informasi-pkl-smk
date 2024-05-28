<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_Models extends Model
{
    use HasFactory;
    protected $fillable = [
        'pkl_id',
        'tanggal',
        'jam',

    ];
}
