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

    public function kasoku_history()
    {
        return $this->hasMany(kasoku_stock::class);
    }
    
    protected $fillable = [
        'nama_barang',
        'ukuran',
    ];
}
