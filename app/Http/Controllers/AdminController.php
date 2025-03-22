<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        // Get the total number of users (no filtering by status)
        $users = User::all(); // You can also use pagination if needed
        $totalUsers = User::count();

        // Return the view with the necessary data
        return view('admin', compact('users', 'totalUsers'));
    }

    /**
     * Display the list of users.
     */
    public function index()
    {
        // Retrieve all users
        $users = User::all();
        return view('admin.users.index', compact('users')); // You might need to create a new view for this
    }

    // Store a newly created user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create($request->all());

        return redirect()->route('admin.users.index');
    }

    // Show the form to edit an existing user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user')); 
    }

    // Update an existing user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('admin.users.index');
    }

    // Delete a user
    public function destroy($id)
    {
        // Find the user by ID and delete
        $user = User::findOrFail($id);
        $user->delete();
    
        // Redirect back to the dashboard after deletion
        return redirect()->route('admin')->with('success', 'User deleted successfully');
    }
}

