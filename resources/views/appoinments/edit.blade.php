@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Edit Appointment</h3>
                <p class="text-muted mb-0">Update appointment schedule and status.</p>
            </div>
            <a href="{{ url('/appoinments') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <form action="{{ isset($appointment) ? url('/appoinments/' . $appointment->id) : '#' }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="doctor_id" class="form-label">Doctor</label>
                    <select id="doctor_id" name="doctor_id" class="form-select" required>
                        <option value="">Select doctor</option>
                        @foreach($doctors ?? [] as $doctor)
                            <option value="{{ $doctor->id }}" @selected(old('doctor_id', $appointment->doctor_id ?? '') == $doctor->id)>{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="patient_id" class="form-label">Patient</label>
                    <select id="patient_id" name="patient_id" class="form-select" required>
                        <option value="">Select patient</option>
                        @foreach($patients ?? [] as $patient)
                            <option value="{{ $patient->id }}" @selected(old('patient_id', $appointment->patient_id ?? '') == $patient->id)>{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="appointment_date" class="form-label">Appointment Date</label>
                    <input type="date" id="appointment_date" name="appointment_date" class="form-control" value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}" required>
                </div>
                <div class="col-md-4">
                    <label for="appointment_time" class="form-label">Appointment Time</label>
                    <input type="time" id="appointment_time" name="appointment_time" class="form-control" value="{{ old('appointment_time', $appointment->appointment_time ?? '') }}" required>
                </div>
                <div class="col-md-4">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select" required>
                        @foreach(['pedding', 'confirmed', 'completed', 'cancelled'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $appointment->status ?? 'pedding') === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea id="reason" name="reason" class="form-control" rows="4" required>{{ old('reason', $appointment->reason ?? '') }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update Appointment</button>
        </form>
    </div>
@endsection
