<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table='checklist';
    protected $primaryKey = 'id_checklist';

    protected $fillable = [
        'id_checklist',
        'id_peminjaman',
        'tanggal_pengembalian',
        'kondisi',
    ];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class);
    }
}
