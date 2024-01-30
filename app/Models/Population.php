<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'state_id', 'year'];

    /**
     * Get the latest register year
     */
    public static function latestYear(): ?int
    {
        return self::orderBy('year', 'desc')->select('year')->first()?->year;
    }
}
