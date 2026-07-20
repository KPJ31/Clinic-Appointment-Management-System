<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with(['specialization', 'services'])->get();

        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specializations = Specialization::all();
        $services = Service::all();

        return view('doctors.create', compact('specializations', 'services'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
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

        $doctor = Doctor::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'consulatation_fee' => $validated['consulatation_fee'],
            'available_from' => $validated['available_from'],
            'available_to' => $validated['available_to'],
            'specialization_id' => $validated['specialization_id'],
        ]);
        $doctor->services()->sync($validated['service_ids'] ?? []);

        return redirect()->route('doctorIndex')->with('success', 'Doctor added successfully.');
    }

    public function show(Doctor $doctor)
    {
        $doctor->load(['specialization', 'services']);

        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $doctor->load('services');
        $specializations = Specialization::all();
        $services = Service::all();

        return view('doctors.edit', compact('doctor', 'specializations', 'services'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'consulatation_fee' => 'required|numeric|min:0',
            'available_from' => 'required|date_format:H:i',
            'available_to' => 'required|date_format:H:i',
            'specialization_id' => 'required|exists:specializations,id',
            'service_ids' => 'nullable|array',
            'service_ids.*' => 'exists:services,id',
        ]);

        $doctor->update([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'consulatation_fee' => $validated['consulatation_fee'],
            'available_from' => $validated['available_from'],
            'available_to' => $validated['available_to'],
            'specialization_id' => $validated['specialization_id'],
        ]);
        $doctor->services()->sync($validated['service_ids'] ?? []);

        return redirect()->route('doctorIndex')->with('success', 'Doctor updated successfully.');
    }

    public function delete(Doctor $doctor)
    {
        $doctor->services()->sync([]);
        $doctor->delete();

        return redirect()->route('doctorIndex')->with('success', 'Doctor deleted successfully.');
    }
}
