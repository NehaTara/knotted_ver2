<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\WeddingPlan;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $planner = User::findOrFail($request->planner);
        $plan = WeddingPlan::findOrFail($request->plan);
        $user = Auth::user();

        return view('client.orders.create', compact('planner', 'plan', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|string|email|max:255',
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'guests_count' => 'required|integer',
            'planner_id' => 'required|integer|exists:users,id',
            'plan_id' => 'required|integer|exists:wedding_plans,id',
        ]);

        Order::create([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'bride_name' => $request->bride_name,
            'groom_name' => $request->groom_name,
            'guests_count' => $request->guests_count,
            'planner_id' => $request->planner_id,
            'plan_id' => $request->plan_id,
        ]);

        return redirect()->route('client.home', $request->planner_id)->with('success', 'Order placed successfully.');
    }

    public function index()
    {
        $orders = Order::where('planner_id', auth()->id())->get();
        return view('wedding_planner.orders.index', compact('orders'));
    }

    public function confirm(Order $order)
    {
        $order->update(['status' => 'confirmed']);
        return redirect()->route('orders.index')->with('success', 'Order confirmed successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
