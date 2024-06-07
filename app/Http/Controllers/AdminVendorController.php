<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class AdminVendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        return view('admin.vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'image' => 'required|url',
        ]);

        Vendor::create([
            'name' => $request->name,
            'category' => $request->category,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.vendors')->with('success', 'Vendor created successfully.');
    }

    public function edit(Vendor $vendor)
    {
        return view('admin.vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'image' => 'nullable|url',
        ]);

        $vendor->update([
            'name' => $request->name,
            'category' => $request->category,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.vendors')->with('success', 'Vendor updated successfully.');
    }

    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('admin.vendors')->with('success', 'Vendor deleted successfully.');
    }
}
