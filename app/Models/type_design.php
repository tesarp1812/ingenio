<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_design extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'parent_type_id'
    ];
}
