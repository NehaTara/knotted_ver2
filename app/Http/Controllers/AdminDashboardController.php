<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Venue;
use App\Models\InspirationArticle;
use App\Models\Preference;
use App\Models\WeddingPlan;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalWeddingPlanners = User::where('role', 'wedding_planner')->count();
        $totalWeddingPlans = WeddingPlan::count();
        $totalClients = User::where('role', 'client')->count();
        $totalClientOrders = Order::count();
        $totalVendors = Vendor::count();
        $totalVenues = Venue::count();
        $totalArticles = InspirationArticle::count();
        $totalPreferences = Preference::count();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalWeddingPlanners', 'totalWeddingPlans' ,'totalClients', 'totalClientOrders',
            'totalVendors', 'totalVenues', 'totalArticles', 'totalPreferences'
        ));
    }
}
