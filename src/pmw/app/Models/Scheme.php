<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timeline;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scheme extends Model
{
    protected $fillable = [
        'name',
    ];

    public function schemeTypes(): HasMany
    {
        return $this->hasMany(SchemeType::class);
    }

    public function timelines(): HasMany
    {
        return $this->hasMany(Timeline::class);
    }
}
