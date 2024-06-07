<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingPlanner extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'logo', 'description', 'phone', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function weddingPlans()
    {
        return $this->hasMany(WeddingPlan::class);
    }
}
