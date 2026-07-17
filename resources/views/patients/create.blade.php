@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Add Patient</h3>
                <p class="text-muted mb-0">Create patient details and medical profile.</p>
            </div>
            <a href="{{ route('patientIndex') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the errors below.</strong>
            </div>
        @endif

        <form action="{{ route('patientSave') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" required>
                    @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                        <option value="">Select gender</option>
                        <option value="male" @selected(old('gender') === 'male')>Male</option>
                        <option value="female" @selected(old('gender') === 'female')>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="boold_group" class="form-label">Blood Group</label>
                    <input type="text" id="boold_group" name="boold_group" class="form-control @error('boold_group') is-invalid @enderror" value="{{ old('boold_group') }}">
                    @error('boold_group')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="emergency_contact" class="form-label">Emergency Contact</label>
                    <input type="text" id="emergency_contact" name="emergency_contact" class="form-control @error('emergency_contact') is-invalid @enderror" value="{{ old('emergency_contact') }}">
                    @error('emergency_contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="medical_note" class="form-label">Medical Note</label>
                    <textarea id="medical_note" name="medical_note" class="form-control @error('medical_note') is-invalid @enderror" rows="3">{{ old('medical_note') }}</textarea>
                    @error('medical_note')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Save Patient</button>
        </form>
    </div>
@endsection
