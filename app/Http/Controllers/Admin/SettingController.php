<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function update(Request $request)
    {
        // Handle general settings update
        return redirect()->route('admin.settings')
            ->with('success', 'Settings updated successfully.');
    }

    public function updateAppearance(Request $request)
    {
        // Handle appearance settings
        return redirect()->route('admin.settings')
            ->with('success', 'Appearance settings updated successfully.');
    }

    public function updateEmail(Request $request)
    {
        // Handle email settings
        return redirect()->route('admin.settings')
            ->with('success', 'Email settings updated successfully.');
    }

    public function updateSocial(Request $request)
    {
        // Handle social media settings
        return redirect()->route('admin.settings')
            ->with('success', 'Social media settings updated successfully.');
    }

    public function updateAdvanced(Request $request)
    {
        // Handle advanced settings
        return redirect()->route('admin.settings')
            ->with('success', 'Advanced settings updated successfully.');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'current_password' => 'required_with:password',
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        if ($request->password) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
        }

        $data = $request->only(['name', 'email', 'phone', 'address']);
        
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.profile')
            ->with('success', 'Profile updated successfully.');
    }
}