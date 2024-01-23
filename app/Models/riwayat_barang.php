<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_barang extends Model
{

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function barang()
    {
        return $this->belongsTo(barang::class);
    }

    protected $dates = ['created_at', 'updated_at'];

    // ambil jam
    public function getJamCreatedAtAttribute()
    {
        return $this->created_at->format('H:i');
    }

    //ambil date format dd-mm-yyyy
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }


    protected $fillable = [
        'barang_id',
        'jumlah',
        'user_id',
        'keterangan'
    ];
}
