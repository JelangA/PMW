<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\TimelineType;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Timeline extends Model
{
    protected $fillable = [
        'status',
        'scheme_id',
    ];

    public function scheme(): BelongsTo
    {
        return $this->belongsTo(Scheme::class);
    }

    public function timelineTypes(): HasMany
    {
        return $this->hasMany(TimelineType::class);
    }

    // protected $casts = [
    //     'created_at' => 'dateTime:Y-m-d H:i:s',
    // ];
}
