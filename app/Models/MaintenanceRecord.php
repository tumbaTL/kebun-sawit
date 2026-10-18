<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaintenanceRecord extends Model
{
    protected $fillable = [
        'maintenance_code',
        'tree_id',
        'worker_id',
        'maintenance_type',
        'maintenance_date',
        'notes',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'maintenance_date' => 'date',
        ];
    }

    public function tree(): BelongsTo
    {
        return $this->belongsTo(Tree::class);
    }

    public function worker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'worker_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
