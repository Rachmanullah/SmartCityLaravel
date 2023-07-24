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
        'longitude',
        'lokasi',
        'keterangan',
        'kerusakan',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
