<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class AdminVenueController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('admin.venues.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'contact_email' => 'required|string|email|max:255',
            'logo' => 'required|url',
        ]);

        Venue::create([
            'name' => $request->name,
            'category' => $request->category,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'contact_email' => $request->contact_email,
            'logo' => $request->logo,
        ]);

        return redirect()->route('admin.venues')->with('success', 'Venue created successfully.');
    }

    public function edit(Venue $venue)
    {
        return view('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'contact_email' => 'required|string|email|max:255',
            'logo' => 'nullable|url',
        ]);

        $venue->update([
            'name' => $request->name,
            'category' => $request->category,
            'location' => $request->location,
            'capacity' => $request->capacity,
            'contact_email' => $request->contact_email,
            'logo' => $request->logo,
        ]);

        return redirect()->route('admin.venues')->with('success', 'Venue updated successfully.');
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->route('admin.venues')->with('success', 'Venue deleted successfully.');
    }
}
