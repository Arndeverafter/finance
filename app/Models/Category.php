<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'measure',
        'description',
    ];

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
