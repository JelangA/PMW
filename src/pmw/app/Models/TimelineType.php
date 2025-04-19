<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models;

class TimelineType extends Model
{
    protected $fillable = [
        'name',
        'order',
        'start',
        'end',
        'timeline_id',
    ];

    public function timeline(): BelongsTo {
        return $this->belongsTo(Timeline::class);
    }
}
