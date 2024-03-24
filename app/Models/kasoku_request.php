<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasoku_request extends Model
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

    public function baju()
    {
        return $this->belongsTo(baju::class);
    }
    
    protected $fillable = [
        'barang_id',
        'baju_id',
        'qty',
        'status',
        'desc',
        'user_id'
    ];
}
