<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProponentMember extends Model
{
    protected $fillable = [
        'nim',
        'proposal_id',
        'registered_student_id',
    ];
}
