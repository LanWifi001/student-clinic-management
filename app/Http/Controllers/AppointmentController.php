<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Policies\AppointmentPolicy;

class AppointmentController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'student') {
            // Students ONLY see their own records
            $appointments = $user->appointments()->with('user')->paginate(10);
        } else {
            // Nurses and Admins see EVERYTHING
            $appointments = Appointment::with('user')->paginate(10);
        }

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'appointment_date' => 'required|date',
            'title' => 'required|string',
            'reason' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        Appointment::create($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
       $this->authorize('view', $appointment);

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $this->authorize('update', $appointment);

        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        // From the policy, only Nurses/Admins can update appointments
        $this->authorize('update', $appointment);

        $validated = $request->validate([
            'status' => 'required|in:pending,approved,completed,cancelled'
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')->with('success', 'Appointment updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $this->authorize('delete', $appointment);

        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted!');
    }
}
