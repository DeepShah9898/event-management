<?php

// app/Http/Controllers/SettingsController.php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Show the settings page
    public function index()
    {
        // Retrieve all settings
        $settings = Setting::all();

        return view('settings.index', compact('settings'));
    }

    // Update settings
    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            // Find each setting by key and update its value
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully!');
    }
}
