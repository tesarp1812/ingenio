<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_design extends Model
{
    use HasFactory;

    public function responsDesign()
    {
        return $this->belongsTo(respons_request_design::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'respons_id',
        'user_id',
    ];
}
