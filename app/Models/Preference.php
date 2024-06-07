<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'theme_and_style',
        'culture',
        'attire',
        'venue',
        'food_and_drink',
        'flowers',
    ];


    protected $casts = [
        'theme_and_style' => 'array',
        'venue' => 'array',
        'culture' => 'array',
        'attire' => 'array',
        'food_and_drink' => 'array',
        'flowers' => 'array',
    ];
    /**
     * Get the user that owns the preferences.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
