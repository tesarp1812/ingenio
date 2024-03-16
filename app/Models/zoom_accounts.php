<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zoom_accounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'account_id',
        'client_id',
        'client_secret',
        'access_token',
        'refreshed_at',
    ];
}
