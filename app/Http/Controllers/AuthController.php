<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile; 
use App\Models\Agent; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Display the registration form
    public function showRegisterForm()
    {
        return view('register'); // The Blade view for the registration form
    }

    // Handle form submission and store the user
    public function register(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',  
            'role' => 'required|in:' . implode(',', [User::ADMIN, User::AGENT, User::USER]), 
        ]);

        // Create a new user and hash the password
        $user = User::create([
            'username' => $validated['username'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Hashing the password
            'role' => $validated['role'],
        ]);

        // Now that the user is created, use the auto-generated user ID
        // Create the profile and link it to the newly created user
        Agent::create([
            'user_id' => $user->id,  // Use the auto-generated user_id from the created user
            'license_number' => null,  // Nullable fields
            'certifications' => null,  // Nullable fields
            'experience_years' => null,  // Nullable fields
            'bio' => null,  // Nullable fields
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
