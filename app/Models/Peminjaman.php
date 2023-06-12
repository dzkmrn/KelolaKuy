<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table='peminjaman';
    protected $primaryKey = 'id_peminjaman';

    protected $fillable = [
        'id_peminjaman',
        'nim',
        'id_alat',
        'tanggal_peminjaman',
        'durasi_peminjaman',
        'kegiatan',
        'status',
    ];

    public function peminjam(){
        return $this->belongsTo(Peminjam::class);
    }

    public function alat(){
        return $this->belongsTo(Alat::class);
    }

    public function checklist(){
        return $this->hasMany(Checklist::class);
    }
}
