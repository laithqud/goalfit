<?php 

namespace App\Http\Controllers;
use App\Models\Gym; 
use App\Models\WorkoutCategory;
use App\Models\Home;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
 
class ProfileController extends Controller
{
    public function index()
    {
        return view("public.profile");
    }
    public function edit()
    {
        return view('public.edit-profile');
    }
    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'height_cm' => 'nullable|numeric|min:0',
            'weight_kg' => 'nullable|numeric|min:0',
            'profile_photo' => 'nullable|image|max:2048',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update basic info
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->birth_date = $validated['birth_date'];
        $user->gender = $validated['gender'];
        $user->height_cm = $validated['height_cm'];
        $user->weight_kg = $validated['weight_kg'];

        // Update profile photo if uploaded
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $photoPath;
        }

        // Update password if requested
        if ($request->filled('new_password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $user = User::find(Auth::id());

        // Check if the entered password matches the current password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }

        // Optionally delete profile photo from storage
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        // Log the user out
        Auth::logout();

        // Delete user account
        $user->delete();

        // Invalidate and regenerate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }

}