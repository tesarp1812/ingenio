<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zoom_respons extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'region_id',
        'activity_type_id',
        'class_name',
        'start_date',
        'start_time',
        'end_time',
        'whatsapp',
        'zoom_account_id',
        'login_url',
        'claim_host',
        'is_online',
        'zoom_account_id'
    ];
}
