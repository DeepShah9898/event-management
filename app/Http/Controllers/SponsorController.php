<?php

// app/Http/Controllers/SponsorController.php

// app/Http/Controllers/SponsorController.php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        return view('sponsors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,avif,gif,svg|max:5048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'social_media' => 'nullable|json',
        ]);

        // Handling file upload for logo
        if ($request->hasFile('logo')) {
            $fileName = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('logos'), $fileName);
            $validated['logo'] = 'logos/' . $fileName;
        }

        // Create the sponsor
        Sponsor::create($validated);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor added successfully!');
    }

    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        return view('sponsors.edit', compact('sponsor'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'social_media' => 'nullable|json',
        ]);

        $sponsor = Sponsor::findOrFail($id);

        // Handling file upload for logo
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($sponsor->logo) {
                Storage::delete(str_replace('storage/', 'public/', $sponsor->logo));
            }
            $filePath = $request->file('logo')->store('public/logos');
            $validated['logo'] = Storage::url($filePath);
        }

        // Update the sponsor data
        $sponsor->update($validated);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor updated successfully!');
    }

        public function show($id)
    {
        // Retrieve the sponsor by its ID
        $sponsor = Sponsor::findOrFail($id);

        // Pass the sponsor data to the 'show' view
        return view('sponsors.show', compact('sponsor'));
    }

    public function destroy($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        // Delete the logo file from storage if exists
        if ($sponsor->logo) {
            Storage::delete(str_replace('storage/', 'public/', $sponsor->logo));
        }

        // Delete sponsor from the database
        $sponsor->delete();

        return redirect()->route('sponsors.index')->with('success', 'Sponsor deleted successfully!');
    }
}
