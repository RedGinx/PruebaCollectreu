<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the profile edit form
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update the profile
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);

        // Update the name
        $user->name = $request->name;

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            // Store the new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = basename($path);
        }

        // Save the changes
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado correctamente.');
    }
}
