<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respons_request_design extends Model
{
    use HasFactory;

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
        'word_file_path'
    ];
}
