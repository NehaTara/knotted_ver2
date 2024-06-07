<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Preference;

class ClientPreferenceController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $preferences = $user->preferences;

        return view('client.preferences', compact('preferences'));
    }

    public function update(Request $request)
{
    $preferences = Preference::firstOrNew(['user_id' => auth()->id()]);

    $preferences->theme_and_style = $request->input('theme_and_style', []);
    $preferences->venue = $request->input('venue', []);
    $preferences->culture = $request->input('culture', []);
    $preferences->attire = $request->input('attire', []);
    $preferences->food_and_drink = $request->input('food_and_drink', []);
    $preferences->flowers = $request->input('flowers', []);

    $preferences->save();

    return redirect()->route('client.preferences')->with('status', 'Preferences updated successfully!');
}

}
