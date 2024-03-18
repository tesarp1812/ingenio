<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baju extends Model
{
    use HasFactory;
    protected $table = 'baju';

    public function riwayat()
    {
        return $this->hasMany(riwayat_barang::class);
    }
    
    protected $fillable = [
        'nama_barang',
        'ukuran',
    ];
}
