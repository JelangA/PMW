<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models;

class Proposal extends Model
{
    protected $fillable = [
        'letter',
        'team_name',
        'nip',
        'nim_leader',
        'nim_member_1',
        'nim_member_2',
        'nim_member_3',
        'nim_member_4',
        'business_name',
        'business_overview',
        'business_instagram',
        'business_situation',
        'submission_funds',
        'turnover_target',
        'status',
        'support_files',
        'is_completed',
        'scheme_type_id',
    ];

    protected $casts = [
        'support_files' => 'array',
    ];

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    public function leader(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'nim_leader', 'nim');
    }
}
