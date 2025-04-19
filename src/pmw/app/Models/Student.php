<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim', 'name', 'major', 'study_program', 'year', 'email', 'status',
    ];

    public function registeredStudent()
    {
        return $this->hasOne(RegisteredStudent::class, 'nim', 'nim');
    }

    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            RegisteredStudent::class,
            'nim',
            'id',
            'nim',
            'user_id',
        );
    }
}
