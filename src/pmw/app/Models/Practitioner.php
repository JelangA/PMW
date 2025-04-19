<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    protected $fillable = [
        'name',
        'company',
        'status',
        'user_id',
    ];
}
