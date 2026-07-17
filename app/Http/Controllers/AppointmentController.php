<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])->get();

        return view('appoinments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('appoinments.create', compact('doctors', 'patients'));
    }

    public function save(Request $request)
    {
        $validated = $this->validatedAppointment($request);

        Appointment::create($validated);

        return redirect()->route('appointmentIndex')->with('success', 'Appointment Created Successfully');
    }

    public function show(Appointment $appointment)
    {
        $appointment->load(['doctor', 'patient']);

        return view('appoinments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $doctors = Doctor::all();
        $patients = Patient::all();

        return view('appoinments.edit', compact('appointment', 'doctors', 'patients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $this->validatedAppointment($request);

        $appointment->update($validated);

        return redirect()->route('appointmentIndex')->with('success', 'Appointment Updated Successfully');
    }

    public function delete(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointmentIndex')->with('success', 'Appointment Deleted Successfully');
    }

    private function validatedAppointment(Request $request): array
    {
        return $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'reason' => 'required|string',
            'status' => 'required|in:pedding,confirmed,completed,cancelled',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
        ]);
    }
}
