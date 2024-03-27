<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_design extends Model
{
    use HasFactory;

    public function responRequestDesign()
    {
        return $this->hasMany(respons_request_design::class);
    }

    protected $fillable = [
        'type',
        'parent_type_id'
    ];
}
