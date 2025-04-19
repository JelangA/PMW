<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'scheduled_date',
        'initial_registration_date',
        'final_registration_date',
    ];
}
