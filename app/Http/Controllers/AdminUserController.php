<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function create()
    {
        return view('admin.createAdmin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:admin_users,name|max:255',
            'email' => 'required|string|email|max:255|unique:admin_users,email',
            'password' => 'required|string|min:6|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $profilePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePath = $request->file('profile_picture')->store('profiles', 'public');
        }

        AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $profilePath,
        ]);

        return redirect()->route('admin.createAdmin')->with('success', 'Admin created successfully.');
    }



    // edit method
    public function edit($id)
    {
        $admin = AdminUser::findOrFail($id);
        return view('admin.edit', compact('admin')); // create an 'edit.blade.php' view
    }


    public function update(Request $request, $id)
    {
    $admin = AdminUser::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admin_users,email,' . $admin->id,
        'password' => 'nullable|string|min:6|confirmed',
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Validate old password if new password is provided
    if ($request->filled('password')) {
        if (!Hash::check($request->old_password, $admin->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        // Update the password if it passes validation
        $admin->password = Hash::make($request->password);
    }

    $admin->name = $request->name;
    $admin->email = $request->email;

    // Handle profile picture upload
    if ($request->hasFile('profile_picture')) {
        // Delete old profile picture if exists
        if ($admin->profile_picture && Storage::exists('public/' . $admin->profile_picture)) {
            Storage::delete('public/' . $admin->profile_picture);
        }

        // Store new image
        $profilePath = $request->file('profile_picture')->store('profiles', 'public');
        $admin->profile_picture = $profilePath;
    }

    $admin->save();

    return redirect()->route('admin.adminList')->with('success', 'Admin updated successfully!');
    }

    public function updateProfile(Request $request)
{
    $admin = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admin_users,email,' . $admin->id,
        'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $admin->name = $request->name;
    $admin->email = $request->email;

    if ($request->hasFile('profile_picture')) {
        if ($admin->profile_picture && Storage::exists('public/' . $admin->profile_picture)) {
            Storage::delete('public/' . $admin->profile_picture);
        }

        // Store the new image
        $profilePath = $request->file('profile_picture')->store('profiles', 'public');
        $admin->profile_picture = $profilePath;
    }

    $admin->save();

    return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
}


    // Destroy method (Delete)
    public function destroy($id)
    {
        $admin = AdminUser::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.adminList')->with('error', 'Admin deleted successfully!');
    }

}
