<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'measure', 'price', 'category_id', 'description', 'date', 'shop_id',
    ];

    /**
     * Set the relationship
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Set the relationship
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
