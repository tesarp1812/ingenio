<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{

    use HasFactory;
    protected $table = 'barang';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function kasoku_history()
    {
        return $this->hasMany(kasoku_request::class);
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
        'nama_barang',
        'jenis'
    ];
}
