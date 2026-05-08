<?php

namespace App\Http\Controllers;

use App\Models\MedicineLog;
use Illuminate\Http\Request;

class MedicineLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'student_id' => 'required|exists:users,id',
            'quantity_given' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        // 1. Find the medicine in the inventory
        $medicine = \App\Models\Medicine::findOrFail($validated['medicine_id']);

        // 2. Check if we have enough stock
        if ($medicine->quantity < $validated['quantity_given']) {
            return back()->withErrors(['quantity_given' => 'Not enough stock available!']);
        }

        // 3. Subtract the quantity from the medicine inventory
        $medicine->decrement('quantity', $validated['quantity_given']);

        // 4. Create the log entry
        MedicineLog::create([
            'medicine_id' => $validated['medicine_id'],
            'student_id' => $validated['student_id'],
            'staff_id' => auth()->id(), // The logged-in Nurse/Admin
            'quantity_given' => $validated['quantity_given'],
            'notes' => $validated['notes'],
        ]);

        return redirect()->route('medicines.index')->with('success', 'Medicine dispensed and inventory updated!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(MedicineLog $medicineLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicineLog $medicineLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicineLog $medicineLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicineLog $medicineLog)
    {
        //
    }
}
