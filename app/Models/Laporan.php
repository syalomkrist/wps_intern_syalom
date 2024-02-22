<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Laporan extends Model
{
    protected $table = 'laporans';
    protected $fillable = [
        'nama',
        'jabatan',
        'tanggal',
        'laporan',
    ];
    
    public function setTanggalAttribute($value)
    {
    $this->attributes['tanggal'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }
}
