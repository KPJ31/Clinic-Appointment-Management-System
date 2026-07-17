<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $validated = $this->validatedPatient($request);

        $profileData = $this->profileData($validated);
        $patientData = $this->patientData($validated);

        $patient = Patient::create($patientData);
        $patient->profile()->create($profileData);

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
        $validated = $this->validatedPatient($request, $patient);

        $patient->update($this->patientData($validated));
        $patient->profile()->updateOrCreate(
            ['patient_id' => $patient->id],
            $this->profileData($validated)
        );

        return redirect()->route('patientIndex')->with('success', 'Patient Updated Successfully');
    }

    public function delete(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patientIndex')->with('success', 'Patient Deleted Successfully');
    }

    private function validatedPatient(Request $request, ?Patient $patient = null): array
    {
        $emailRule = Rule::unique('patients');

        if ($patient) {
            $emailRule->ignore($patient->id);
        }

        return $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                $emailRule,
            ],
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'boold_group' => 'nullable|string|max:10',
            'emergency_contact' => 'nullable|string|max:20',
            'medical_note' => 'nullable|string',
        ]);
    }

    private function patientData(array $validated): array
    {
        return [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'dob' => $validated['dob'],
            'gender' => $validated['gender'],
            'address' => $validated['address'],
        ];
    }

    private function profileData(array $validated): array
    {
        return [
            'boold_group' => $validated['boold_group'] ?? '',
            'emergency_contact' => $validated['emergency_contact'] ?? '',
            'medical_note' => $validated['medical_note'] ?? '',
        ];
    }
}
