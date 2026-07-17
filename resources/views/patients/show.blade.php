@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">{{ $patient->name ?? 'Patient Details' }}</h3>
                <p class="text-muted mb-0">Patient details and medical profile.</p>
            </div>
            <a href="{{ url('/patients') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <dl class="row mb-0">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $patient->id ?? '-' }}</dd>
            <dt class="col-sm-3">Phone</dt>
            <dd class="col-sm-9">{{ $patient->phone ?? '-' }}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $patient->email ?? '-' }}</dd>
            <dt class="col-sm-3">Date of Birth</dt>
            <dd class="col-sm-9">{{ $patient->dob ?? '-' }}</dd>
            <dt class="col-sm-3">Gender</dt>
            <dd class="col-sm-9 text-capitalize">{{ $patient->gender ?? '-' }}</dd>
            <dt class="col-sm-3">Address</dt>
            <dd class="col-sm-9">{{ $patient->address ?? '-' }}</dd>
            <dt class="col-sm-3">Blood Group</dt>
            <dd class="col-sm-9">{{ $patient->profile->boold_group ?? '-' }}</dd>
            <dt class="col-sm-3">Emergency Contact</dt>
            <dd class="col-sm-9">{{ $patient->profile->emergency_contact ?? '-' }}</dd>
            <dt class="col-sm-3">Medical Note</dt>
            <dd class="col-sm-9">{{ $patient->profile->medical_note ?? '-' }}</dd>
        </dl>
    </div>
@endsection
