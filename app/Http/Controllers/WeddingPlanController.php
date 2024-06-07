<?php

namespace App\Http\Controllers;

use App\Models\WeddingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeddingPlanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'wedding_planner') {
            abort(403, 'Unauthorized action.');
        }

        $plans = Auth::user()->weddingPlanner->weddingPlans;
        return view('wedding_planner.plans.index', compact('plans'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'wedding_planner') {
            abort(403, 'Unauthorized action.');
        }

        return view('wedding_planner.plans.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'wedding_planner') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // add other fields validation as necessary
        ]);

        $plan = new WeddingPlan($request->all());
        $plan->wedding_planner_id = Auth::user()->weddingPlanner->id;
        $plan->save();

        return redirect()->route('wedding_planner.plans')->with('success', 'Wedding plan created successfully.');
    }

    public function show(WeddingPlan $plan)
    {
        if (Auth::user()->role !== 'wedding_planner' || Auth::user()->id !== $plan->weddingPlanner->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('wedding_planner.plans.show', compact('plan'));
    }

    public function edit(WeddingPlan $plan)
    {
        if (Auth::user()->role !== 'wedding_planner' || Auth::user()->id !== $plan->weddingPlanner->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('wedding_planner.plans.edit', compact('plan'));
    }

    public function update(Request $request, WeddingPlan $plan)
    {
        if (Auth::user()->role !== 'wedding_planner' || Auth::user()->id !== $plan->weddingPlanner->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // add other fields validation as necessary
        ]);

        $plan->update($request->all());

        return redirect()->route('wedding_planner.plans')->with('success', 'Wedding plan updated successfully.');
    }

    public function destroy(WeddingPlan $plan)
    {
        if (Auth::user()->role !== 'wedding_planner' || Auth::user()->id !== $plan->weddingPlanner->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $plan->delete();

        return redirect()->route('wedding_planner.plans')->with('success', 'Wedding plan deleted successfully.');
    }
}
