<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name', 'custom_id'];

    /**
     * Populations relationship
     */
    public function populations(): HasMany
    {
        return $this->hasMany(Population::class);
    }
}
