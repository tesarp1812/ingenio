<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_baju extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function baju()
    {
        return $this->belongsTo(Baju::class);
    }

    protected $dates = ['created_at', 'updated_at'];

    public function getJamCreatedAtAttribute()
{
    if ($this->created_at !== null) {
        return $this->created_at->format('H:i');
    }

    return null; // atau sesuai kebutuhan jika tidak ada nilai
}

public function getFormattedCreatedAtAttribute()
{
    if ($this->created_at !== null) {
        return $this->created_at->format('d-m-Y');
    }

    return null; // atau sesuai kebutuhan jika tidak ada nilai
}


    protected $fillable = [
        'baju_id',
        'jumlah',
        'user_id',
        'keterangan'
    ];
}
