<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tree extends Model
{
    protected $fillable = [
        'tree_code',
        'block_id',
        'age_months',
        'condition',
        'maintenance_status',
        'latitude',
        'longitude',
        'planted_at',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'age_months' => 'integer',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'planted_at' => 'date',
        ];
    }

    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }
}
