<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisteredStudent extends Model
{
    protected $fillable = [
        'user_id',
        'nim',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'nim', 'nim');
    }
}
