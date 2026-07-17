@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Edit Patient</h3>
                <p class="text-muted mb-0">Update patient details and profile.</p>
            </div>
            <a href="{{ url('/patients') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <form action="{{ isset($patient) ? url('/patients/' . $patient->id) : '#' }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $patient->name ?? '') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $patient->phone ?? '') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $patient->email ?? '') }}" required>
                </div>
                <div class="col-md-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', $patient->dob ?? '') }}" required>
                </div>
                <div class="col-md-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" name="gender" class="form-select" required>
                        <option value="">Select gender</option>
                        <option value="male" @selected(old('gender', $patient->gender ?? '') === 'male')>Male</option>
                        <option value="female" @selected(old('gender', $patient->gender ?? '') === 'female')>Female</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="address" name="address" class="form-control" rows="3" required>{{ old('address', $patient->address ?? '') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="boold_group" class="form-label">Blood Group</label>
                    <input type="text" id="boold_group" name="boold_group" class="form-control" value="{{ old('boold_group', $patient->profile->boold_group ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label for="emergency_contact" class="form-label">Emergency Contact</label>
                    <input type="text" id="emergency_contact" name="emergency_contact" class="form-control" value="{{ old('emergency_contact', $patient->profile->emergency_contact ?? '') }}">
                </div>
                <div class="col-12">
                    <label for="medical_note" class="form-label">Medical Note</label>
                    <textarea id="medical_note" name="medical_note" class="form-control" rows="3">{{ old('medical_note', $patient->profile->medical_note ?? '') }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update Patient</button>
        </form>
    </div>
@endsection
