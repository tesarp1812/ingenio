<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_design extends Model
{
    use HasFactory;

    protected $fillable = [
        'respons_id',
        'user_id',
        'description',
        'status_id'
    ];
}
