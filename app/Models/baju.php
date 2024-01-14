<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baju extends Model
{
    use HasFactory;

    public function riwayat()
    {
        return $this->hasMany(riwayat_baju::class);
    }
    
    protected $fillable = [
        'baju',
        'ukuran', 
    ];
}
