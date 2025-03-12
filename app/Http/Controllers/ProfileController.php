<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show the user's profile
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', ['user' => $user]);
    }

    //    Update Name======>

    public function editName()
    {
        $user = Auth::user();
        return view('profile.editName', ['user' => $user]);
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'new_name' => 'required|string|max:255|different:name',
            'confirm_name' => 'required|string|max:255|same:new_name',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->new_name,
        ]);

        return redirect()->route('profile.show')->with('success', 'Name updated successfully!');
    }

    //    Update Email======>

    public function editEmail()
    {
        $user = Auth::user();
        return view('profile.editEmail', ['user' => $user]);
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|string|email|max:255|unique:users,email',
            'confirm_email' => 'required|string|email|max:255|same:new_email',
        ]);

        $user = Auth::user();
        $user->update([
            'email' => $request->new_email,
        ]);

        return redirect()->route('profile.show')->with('success', 'Email updated successfully!');
    }

    public function editPassword()
    {
        return view('profile.editPassword');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'different:current_password'],
            'confirm_password' => ['required', 'string', 'same:new_password'],
        ]);

        $user = Auth::user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile.show')->with('success', 'Password updated successfully!');
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validate file type and size
        ]);

        $user = Auth::user();

        // Store the file and get the path
        $logoPath = $request->logo->store('logos');

        // Update employer logo
        if ($user->employer) {
            $user->employer->update(['logo' => $logoPath]);
        }

        return redirect()->route('profile.show')->with('success', 'Logo updated successfully!');
    }


}
