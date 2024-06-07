<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientPreferenceController;
use App\Http\Controllers\ClientInspirationController;
use App\Http\Controllers\ClientWeddingPlannerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WeddingPlanController;
use App\Http\Controllers\WeddingPlannerArticleController;
use App\Http\Controllers\AdminWeddingPlannerController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminVendorController;
use App\Http\Controllers\AdminVenueController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Preference;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/wedding-planners', function () {
    return view('weddingplanners');
})->name('weddingplanners');
Route::get('/inspiration', function () {
    return view('inspiration');
})->name('inspiration');
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');
Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/client/home', function () {
    $user = Auth::user();
    $hasPreferences = $user->preferences()->exists();
    return view('client.home', compact('hasPreferences'));
})->name('client.home')->middleware('auth');
Route::get('/client/preferences', [ClientPreferenceController::class, 'edit'])->name('client.preferences');
Route::post('/client/preferences', [ClientPreferenceController::class, 'update'])->name('preferences.update');
Route::get('/client/inspiration', [ClientInspirationController::class, 'inspiration'])->name('client.inspiration');
Route::get('/client/inspiration/{article}', [ClientInspirationController::class, 'show'])->name('client.inspiration.show');
Route::get('/client/wedding-planners', [ClientWeddingPlannerController::class, 'index'])->name('client.wedding-planners');
Route::get('/client/wedding-planners/{planner}', [ClientWeddingPlannerController::class, 'show'])->name('client.wedding-planners.show');
Route::get('/client/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/client/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/client/chat', function () {
    return view('client.chat');
})->name('client.chat');

Route::get('/wedding_planner/home', function () {
    return view('wedding_planner.home');
})->name('wedding_planner.home');

Route::get('/wedding_planner/plans', [WeddingPlanController::class, 'index'])->name('wedding_planner.plans');
Route::get('/wedding_planner/plans/create', [WeddingPlanController::class, 'create'])->name('wedding_planner.plans.create');
Route::post('/wedding_planner/plans', [WeddingPlanController::class, 'store'])->name('wedding_planner.plans.store');
Route::get('/wedding_planner/plans/{plan}', [WeddingPlanController::class, 'show'])->name('wedding_planner.plans.show');
Route::get('/wedding_planner/plans/{plan}/edit', [WeddingPlanController::class, 'edit'])->name('wedding_planner.plans.edit');
Route::put('/wedding_planner/plans/{plan}', [WeddingPlanController::class, 'update'])->name('wedding_planner.plans.update');
Route::delete('/wedding_planner/plans/{plan}', [WeddingPlanController::class, 'destroy'])->name('wedding_planner.plans.destroy');

Route::get('/wedding_planner/blog-and-events', [WeddingPlannerArticleController::class, 'index'])->name('wedding_planner.blogevents');
Route::get('/wedding_planner/blog-and-events/create', [WeddingPlannerArticleController::class, 'create'])->name('wedding_planner.blogevents.create');
Route::post('/wedding_planner/blog-and-events', [WeddingPlannerArticleController::class, 'store'])->name('wedding_planner.blogevents.store');
Route::get('/wedding_planner/blog-and-events/{article}', [WeddingPlannerArticleController::class, 'show'])->name('wedding_planner.blogevents.show');
Route::get('/wedding_planner/blog-and-events/{article}/edit', [WeddingPlannerArticleController::class, 'edit'])->name('wedding_planner.blogevents.edit');
Route::put('/wedding_planner/blog-and-events/{article}', [WeddingPlannerArticleController::class, 'update'])->name('wedding_planner.blogevents.update');
Route::delete('/wedding_planner/blog-and-events/{article}', [WeddingPlannerArticleController::class, 'destroy'])->name('wedding_planner.blogevents.destroy');
Route::get('/wedding_planner/clients', [OrderController::class, 'index'])->name('wedding_planner.clients');
Route::post('/wedding_planner/clients/{order}/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');
Route::delete('/wedding_planner/clients/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('/wedding_planner/chat', function () {
    return view('wedding_planner.chat');
})->name('wedding_planner.chat');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/wedding-planners', [AdminWeddingPlannerController::class, 'index'])->name('admin.wedding_planners');
Route::get('/admin/wedding-planners/{planner}', [AdminWeddingPlannerController::class, 'show'])->name('admin.wedding_planner.show');
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

Route::get('/admin/vendors', [AdminVendorController::class, 'index'])->name('admin.vendors');
Route::get('/admin/vendors/create', [AdminVendorController::class, 'create'])->name('admin.vendors.create');
Route::post('/admin/vendors', [AdminVendorController::class, 'store'])->name('admin.vendors.store');
Route::get('/admin/vendors/{vendor}/edit', [AdminVendorController::class, 'edit'])->name('admin.vendors.edit');
Route::put('/admin/vendors/{vendor}', [AdminVendorController::class, 'update'])->name('admin.vendors.update');
Route::delete('/admin/vendors/{vendor}', [AdminVendorController::class, 'destroy'])->name('admin.vendors.destroy');

Route::get('/admin/venues', [AdminVenueController::class, 'index'])->name('admin.venues');
Route::get('/admin/venues/create', [AdminVenueController::class, 'create'])->name('admin.venues.create');
Route::post('/admin/venues', [AdminVenueController::class, 'store'])->name('admin.venues.store');
Route::get('/admin/venues/{venue}/edit', [AdminVenueController::class, 'edit'])->name('admin.venues.edit');
Route::put('/admin/venues/{venue}', [AdminVenueController::class, 'update'])->name('admin.venues.update');
Route::delete('/admin/venues/{venue}', [AdminVenueController::class, 'destroy'])->name('admin.venues.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
