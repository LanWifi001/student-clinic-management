<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            // Admins see every user
            $users = User::paginate(10);
        }
        else {
            // Nurses and Students cannot see other users
            $error = 'Access denied.';
            return redirect()->route('dashboard')->with('error', $error);
        }

        return view('users.index', compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user_role = auth()->user();

        if ($user_role->role === 'admin') {
            return view('users.edit', compact('user'));
        }
        else {
            // Nurses and Students cannot see other users
            $error = 'Access denied.';
            return redirect()->route('dashboard')->with('error', $error);
        }        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user_role = auth()->user();

        if ($user_role->role === 'admin') {
            $validated = $request->validate([
                'role' => 'required|in:student,nurse,admin'
            ]);
            $user->update($validated);
            return redirect()->route('users.index')->with('success', 'User updated!');
        }
        else {
            // Nurses and Students cannot see other users
            $error = 'Access denied.';
            return redirect()->route('dashboard')->with('error', $error);
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user_role = auth()->user();

        if ($user_role->role === 'admin') {
            $user->delete();
            return redirect()->route('appointments.index')->with('success', 'Appointment deleted!');
        }
        else {
            // Nurses and Students cannot see other users
            $error = 'Access denied.';
            return redirect()->route('dashboard')->with('error', $error);
        }        
    }
}
