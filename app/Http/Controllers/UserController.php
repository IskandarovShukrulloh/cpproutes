<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ========================================================================
    // 📋 ADMIN/RESOURCE ACTIONS - CRUD operations for user management
    // ========================================================================

    /**
     * Display all users (admin panel)
     * GET /users - List all registered users with pagination/sorting
     */
    public function index()
    {
        $users = User::paginate(15); // Fetch users with pagination
        return view('users.index', compact('users'));
    }

    /**
     * Show create user form (admin panel)
     * GET /users/create - Display form for creating new user
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store new user (admin panel)
     * POST /users - Save new user to database
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password, // Auto-hashed via model cast
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display single user (admin/public view)
     * GET /users/{user} - Show user details
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show edit user form (admin panel)
     * GET /users/{user}/edit - Display form for editing user
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update user (admin panel)
     * PUT /users/{user} - Save changes to user data
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;

        // Only update password if provided
        if ($request->filled('password')) {
            $user->password = $request->password; // Auto-hashed via model cast
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Delete user (admin panel)
     * DELETE /users/{user} - Remove user from database
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    // ========================================================================
    // 👤 USER PROFILE ACTIONS - Personal profile management & viewing
    // ========================================================================

    /**
     * Display current user's profile
     * GET /profile - Show authenticated user's profile page
     * Only accessible to logged-in users
     */
    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    /**
     * Update current user's profile
     * PUT /profile - Save changes to authenticated user's profile
     * Only updates password if provided, validates uniqueness excluding self
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed', // Requires password_confirmation field
        ]);

        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = $request->password; // Auto-hashed via model cast
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    // ========================================================================
    // 👥 PUBLIC USER PROFILE - View any user's public profile
    // ========================================================================

    /**
     * Display user's public profile
     * GET /profile/{user} - Show public user information by ID or username
     * Accessible without authentication for user discovery
     *
     * @param mixed $user - User ID or username identifier
     */
    public function showProfile($user)
    {
        // Try to find by ID first, then by username as fallback
        $user = User::where('id', $user)
            ->orWhere('username', $user)
            ->firstOrFail();

        return view('users.show', compact('user'));
    }
}
