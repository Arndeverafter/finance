<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WasteType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function waste(): HasMany
    {
        return $this->hasMany(Waste::class);
    }
}
