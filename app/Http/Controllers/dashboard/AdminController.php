<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // Display all admins
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('admin.admins.index', compact('admins'));   
    }

    // Show create form
    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'role' => 'required|in:admin,superadmin',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        Admin::create($validated);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin created successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));   
    }

    // Update admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'role' => 'required|in:admin,superadmin',
            'password' => 'nullable|min:8|confirmed'
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $admin->update($validated);

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin updated successfully');
    }

    // Delete admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        
        // Prevent deleting superadmin
        if ($admin->role === 'superadmin') {
            return back()->with('error', 'Cannot delete superadmin');
        }

        $admin->delete();

        return redirect()->route('admin.admins.index')
            ->with('success', 'Admin deleted successfully');
    }
}