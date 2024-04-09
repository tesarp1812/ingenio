<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respons_request_design extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusDesign()
    {
        return $this->belongsTo(status_design::class);
    }

    public function typeDesign()
    {
        return $this->belongsTo(type_design::class);
    }

    public function historyDesign()
    {
        return $this->hasMany(history_design::class);
    }

    protected $fillable = [
        'user_id',
        'type_design_id',
        'size',
        'duration',
        'description',
        'deadline',
        'is_cito',
        'whatsapp',
        'status_id',
        'word_file'
    ];
}
