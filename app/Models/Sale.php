<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    protected $fillable = [
        'sale_date',
        'harvest_period_start',
        'harvest_period_end',
        'factory_name',
        'weight_tons',
        'price_per_kg',
        'total_amount',
        'status',
        'notes',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'sale_date' => 'date',
            'harvest_period_start' => 'date',
            'harvest_period_end' => 'date',
            'weight_tons' => 'decimal:3',
            'price_per_kg' => 'decimal:2',
            'total_amount' => 'decimal:2',
        ];
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
