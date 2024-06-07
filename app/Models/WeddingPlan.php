<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeddingPlan extends Model
{
   use HasFactory;

    protected $fillable = ['name', 'description', 'wedding_planner_id'];

    public function weddingPlanner()
    {
        return $this->belongsTo(WeddingPlanner::class);
    }
}
