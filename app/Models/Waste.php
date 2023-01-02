<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Waste extends Model
{
    use HasFactory;

    protected $fillable = [
        'waste_type_id', 'measure', 'total', 'account_id',
    ];

    /**
     * Set the relationship
     */
    public function waste_type(): BelongsTo
    {
        return $this->belongsTo(WasteType::class);
    }

    /**
     * Set the relationship
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
