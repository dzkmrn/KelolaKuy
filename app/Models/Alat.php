<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table='alat';
    protected $primaryKey = 'id_alat';

    protected $fillable = [
        'id_alat',
        'id_kategori',
        'id_jenis',
        'nama_alat',
        'foto_alat',
        'merk_alat',
        'kondisi_alat',
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function jenis(){
        return $this->belongsTo(Jenis::class);
    }
    
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
}
