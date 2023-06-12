<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='peminjam';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'nama_peminjam',
        'jenis_kelamin',
        'prodi',
        'kelas',
        'no_handphone',
    ];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
}
