<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkReport extends Model
{
    protected $fillable = [
        'report_code',
        'worker_id',
        'work_task_id',
        'task_name',
        'task_location',
        'work_date',
        'notes',
        'photo_paths',
        'status_verification',
        'verified_by',
        'verified_at',
        'verification_notes',
    ];

    protected $casts = [
        'work_date' => 'date',
        'photo_paths' => 'array',
        'verified_at' => 'datetime',
    ];

    public function worker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(WorkTask::class, 'work_task_id');
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
