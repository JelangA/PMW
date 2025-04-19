<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models;

class SchemeType extends Model
{
    protected $fillable = [
        'name',
        'scheme_id',
    ];

    public function scheme(): BelongsTo {
        return $this->belongsTo(Scheme::class);
    }
}
