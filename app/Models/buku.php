<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    public function riwayat()
    {
        return $this->hasMany(riwayat_buku::class);
    }

    protected $fillable = [
        'nama_buku'
    ];
}
