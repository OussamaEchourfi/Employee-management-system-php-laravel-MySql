<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the user's profile
     */
    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the user's profile
     */
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->bio = $request->bio;

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()->route('admin.profile.show')
            ->with('success', 'Profil mis à jour avec succès!');
    }

    /**
     * Show the form for changing password
     */
    public function changePassword()
    {
        return view('admin.profile.change-password');
    }

    /**
     * Update the user's password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.profile.show')
            ->with('success', 'Mot de passe modifié avec succès!');
    }

    /**
     * Show user activity/logs
     */
    public function activity()
    {
        $user = Auth::user();
        // You can add activity logging here later
        $activities = collect(); // Placeholder for now
        
        return view('admin.profile.activity', compact('user', 'activities'));
    }

    /**
     * Show user preferences
     */
    public function preferences()
    {
        $user = Auth::user();
        return view('admin.profile.preferences', compact('user'));
    }

    /**
     * Update user preferences
     */
    public function updatePreferences(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'language' => 'required|in:fr,en',
            'timezone' => 'required|string',
            'notifications_email' => 'boolean',
            'notifications_sms' => 'boolean',
            'theme' => 'required|in:light,dark,auto'
        ]);

        $user->preferences = array_merge($user->preferences ?? [], [
            'language' => $request->language,
            'timezone' => $request->timezone,
            'notifications_email' => $request->boolean('notifications_email'),
            'notifications_sms' => $request->boolean('notifications_sms'),
            'theme' => $request->theme
        ]);

        $user->save();

        return redirect()->route('admin.profile.preferences')
            ->with('success', 'Préférences mises à jour avec succès!');
    }
}
