<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    public function index() {
        $doctors = Doctor::with(['specialization', 'services'])->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create() {
        $specializations = Specialization::all();
        $services = Service::all();
        return view('doctors.create', compact('specializations', 'services'));
    }

    public function save(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:doctors',
            'consulatation_fee' => 'required|numeric|min:0',
            'available_from' => 'required|date_format:H:i',
            'available_to' => 'required|date_format:H:i',
            'specialization_id' => 'required|exists:specializations,id',
            'service_ids' => 'nullable|array',
            'service_ids.*' => 'exists:services,id',
        ]);

        $serviceIds = $validatedData['service_ids'] ?? [];
        unset($validatedData['service_ids']);

        $doctor = Doctor::create($validatedData);
        $doctor->services()->sync($serviceIds);

        return redirect()->route('doctorIndex')->with('success', 'Doctor added successfully.');
    }

    public function show(Doctor $doctor) {
        $doctor->load(['specialization', 'services']);
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor) {
        $doctor->load('services');
        $specializations = Specialization::all();
        $services = Service::all();
        return view('doctors.edit', compact('doctor', 'specializations', 'services'));
    }

    public function update(Request $request, Doctor $doctor) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('doctors')->ignore($doctor->id),
            ],
            'consulatation_fee' => 'required|numeric|min:0',
            'available_from' => 'required|date_format:H:i',
            'available_to' => 'required|date_format:H:i',
            'specialization_id' => 'required|exists:specializations,id',
            'service_ids' => 'nullable|array',
            'service_ids.*' => 'exists:services,id',
        ]);

        $serviceIds = $validatedData['service_ids'] ?? [];
        unset($validatedData['service_ids']);

        $doctor->update($validatedData);
        $doctor->services()->sync($serviceIds);

        return redirect()->route('doctorIndex')->with('success', 'Doctor updated successfully.');
    }

    public function delete(Doctor $doctor) {
        $doctor->services()->sync([]);
        $doctor->delete();

        return redirect()->route('doctorIndex')->with('success', 'Doctor deleted successfully.');
    }
}
