<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gym;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

        // app/Http/Controllers/dashboard/UserController.php

        public function edit($id)
        {
            $user = User::findOrFail($id);
            $gyms = Gym::all(); // For the home gym dropdown
            
            return view('admin.users.edit', compact('user', 'gyms'));
        }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'height_cm' => 'nullable|numeric|min:50|max:250',
            'weight_kg' => 'nullable|numeric|min:20|max:300',
            'home_gym_id' => 'nullable|exists:gyms,id',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $validated['profile_photo_path'] = $path;
        }
    
        $user->update($validated);
    
        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully');
    }

    
    public function destroy(User $user)
    {
        try {
            // Check if user is trying to delete themselves
            // if ($user->id === auth()->id()) {
            //     return redirect()->back()
            //         ->with('error', 'You cannot delete your own account');
            // }

            // Delete profile photo
            if ($user->profile_photo_path) {
                Storage::delete('public/'.$user->profile_photo_path);
            }

            $user->delete();

            return redirect()->route('admin.users.index')
                ->with('success', 'User deleted successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting user: '.$e->getMessage());
        }
    }
}
