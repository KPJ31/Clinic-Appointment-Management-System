<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('profile')->get();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:patients',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'boold_group' => 'nullable|string|max:10',
            'emergency_contact' => 'nullable|string|max:20',
            'medical_note' => 'nullable|string',
        ]);

        $patient = Patient::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
        ]);

        $patient->profile()->create([
            'boold_group' => $validated['boold_group'] ?? '',
            'emergency_contact' => $validated['emergency_contact'] ?? '',
            'medical_note' => $validated['medical_note'] ?? '',
        ]);

        return redirect()->route('patientIndex')->with('success', 'Patient Created Successfully');
    }

    public function show(Patient $patient)
    {
        $patient->load('profile');

        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $patient->load('profile');

        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'boold_group' => 'nullable|string|max:10',
            'emergency_contact' => 'nullable|string|max:20',
            'medical_note' => 'nullable|string',
        ]);

        $patient->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
        ]);

        $patient->profile()->updateOrCreate(
            ['patient_id' => $patient->id],
            [
                'boold_group' => $validated['boold_group'] ?? '',
                'emergency_contact' => $validated['emergency_contact'] ?? '',
                'medical_note' => $validated['medical_note'] ?? '',
            ]
        );

        return redirect()->route('patientIndex')->with('success', 'Patient Updated Successfully');
    }

    public function delete(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patientIndex')->with('success', 'Patient Deleted Successfully');
    }
}
