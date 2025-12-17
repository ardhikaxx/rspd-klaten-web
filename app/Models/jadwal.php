<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'nama_jadwal',
        'waktu_jadwal',
        'presenter'
    ];

    public function scopeOrderByTime($query)
    {
        return $query->orderBy('waktu_jadwal');
    }

    public function getWaktuFormatAttribute()
    {
        return date('H:i', strtotime($this->waktu_jadwal));
    }
}