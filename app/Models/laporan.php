<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'foto',
        'latitude',
        'longtitude',
        'alamat',
        'keterangan',
        'kerusakan',
        'status',
    ];
}
