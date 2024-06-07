<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name', 'client_email', 'bride_name', 'groom_name', 'guests_count', 'planner_id', 'plan_id', 'status',
    ];
}

