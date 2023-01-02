<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'set_price', 'shop_id', 'measure', 'date',
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
    public function waste(): HasMany
    {
        return $this->hasMany(Waste::class);
    }

    /**
     * Set the relationship
     */
    public function discount(): HasMany
    {
        return $this->hasMany(Discount::class);
    }

    /**
     * Set the relationship
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Get the user's first name.
     *
     * @return Attribute
     */
    protected function shopDateWaste(): Attribute
    {
        return Attribute::make(
            get: static fn ($value, $attributes) => Shop::where('id', $attributes['shop_id'])->select('name')->first()->name.' On '.$attributes['date'],
        );
    }
}
