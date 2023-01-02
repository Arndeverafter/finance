<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'user_id',
    ];

    /**
     *     * Set the relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Set the relationship
     */
    public function account(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    /**
     * Set the relationship
     */
    public function expense(): HasMany
    {
        return $this->hasMany(Expense::class);
    }
}
