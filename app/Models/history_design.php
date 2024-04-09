<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_design extends Model
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

    public function statusDesign()
    {
        return $this->belongsTo(status_design::class);
    }

    protected $fillable = [
        'respons_id',
        'user_id',
        'description',
        'status_id'
    ];
}
