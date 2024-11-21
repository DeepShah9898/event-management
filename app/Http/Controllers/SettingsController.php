<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Display all settings
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    // Show the create setting form
    public function create()
    {
        return view('settings.create');
    }

    // Store a new setting
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:settings,key|max:255',
            'value' => 'required|max:255',
        ]);

        Setting::create([
            'key' => $request->key,
            'value' => $request->value,
        ]);

        return redirect()->route('settings.index')->with('success', 'Setting created successfully!');
    }

    // Show the edit form for a specific setting
    public function edit(Setting $setting)
    {
        return view('settings.edit', compact('setting'));
    }

    // Update a specific setting
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'key' => 'required|max:255|unique:settings,key,' . $setting->id,
            'value' => 'required|max:255',
        ]);

        $setting->update([
            'key' => $request->key,
            'value' => $request->value,
        ]);

        return redirect()->route('settings.index')->with('success', 'Setting updated successfully!');
    }

    // Delete a specific setting
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully!');
    }
}
