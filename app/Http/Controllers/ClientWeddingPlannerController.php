<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WeddingPlanner;

class ClientWeddingPlannerController extends Controller
{
    public function index()
    {
        $planners = User::whereHas('weddingPlanner', function ($query) {
            $query->where('role', 'wedding_planner');
        })->with('weddingPlanner')->get();

        return view('client.wedding-planners', compact('planners'));
    }

    public function show(User $planner)
    {
        $planner->load('weddingPlanner.weddingPlans');
        return view('client.wedding-planner-details', compact('planner'));
    }
}
