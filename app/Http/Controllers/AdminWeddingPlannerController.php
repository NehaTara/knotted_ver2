<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminWeddingPlannerController extends Controller
{
    public function index()
    {
        $planners = User::where('role', 'wedding_planner')->with('weddingPlanner.weddingPlans')->get();
        return view('admin.wedding-planners', compact('planners'));
    }

    public function show(User $planner)
    {
        $planner->load('weddingPlanner.weddingPlans');
        return view('admin.wedding-planner-show', compact('planner'));
    }
}
