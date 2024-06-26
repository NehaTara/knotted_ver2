<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspirationArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'description', 'content', 'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
