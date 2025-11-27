<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function history()
    {
        return view('admin.history');
    }

    public function staff()
    {
        $staff = User::where('role', '!=', 'admin')->get();
        return view('admin.staff', compact('staff'));
    }

    public function staffEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.staff-edit', compact('user'));
    }

    public function staffUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|in:physician,nurse,midwife,dentist',
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('admin.staff')->with('success', 'Staff member updated successfully.');
    }

    public function staffDestroy($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.staff')->with('error', 'Cannot delete admin user.');
        }

        $user->delete();

        return redirect()->route('admin.staff')->with('success', 'Staff member deleted successfully.');
    }

    // NEW PROFILE METHODS
    public function profile()
    {
        return view('admin.profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'role' => 'required|in:admin,physician,nurse,midwife,dentist',
        ]);

        // Update the user's name field as well (for compatibility)
        $userData = $request->only(['first_name', 'last_name', 'email', 'phone', 'date_of_birth', 'role']);
        $userData['name'] = $request->first_name . ' ' . $request->last_name;

        $user->update($userData);

        return redirect()->route('admin.profile')->with('success', 'Personal information updated successfully.');
    }

    public function profileUpdateAddress(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        $user->update($request->only(['country', 'city', 'postal_code']));

        return redirect()->route('admin.profile')->with('success', 'Address updated successfully.');
    }

    public function profileUpdateAvatar(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Delete old avatar if exists
        if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
            Storage::delete('public/' . $user->avatar);
        }

        // Store new avatar
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        
        $user->update(['avatar' => $avatarPath]);

        return redirect()->route('admin.profile')->with('success', 'Profile picture updated successfully.');
    }
}
