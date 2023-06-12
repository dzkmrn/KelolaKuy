<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table='jenis';
    protected $primaryKey = 'id_jenis';
    protected $fillable = [
        'id_jenis',
        'jenis_alat',
        'dekskripsi_jenis',
    ];

    public function alat(){
        return $this->hasMany(Alat::class);
    }
}
