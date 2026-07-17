@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">Appointment Details</h3>
                <p class="text-muted mb-0">Scheduled visit information.</p>
            </div>
            <a href="{{ url('/appoinments') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <dl class="row mb-0">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $appointment->id ?? '-' }}</dd>
            <dt class="col-sm-3">Doctor</dt>
            <dd class="col-sm-9">{{ $appointment->doctor->name ?? $appointment->doctor_id ?? '-' }}</dd>
            <dt class="col-sm-3">Patient</dt>
            <dd class="col-sm-9">{{ $appointment->patient->name ?? $appointment->patient_id ?? '-' }}</dd>
            <dt class="col-sm-3">Date</dt>
            <dd class="col-sm-9">{{ $appointment->appointment_date ?? '-' }}</dd>
            <dt class="col-sm-3">Time</dt>
            <dd class="col-sm-9">{{ $appointment->appointment_time ?? '-' }}</dd>
            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9 text-capitalize">{{ $appointment->status ?? '-' }}</dd>
            <dt class="col-sm-3">Reason</dt>
            <dd class="col-sm-9">{{ $appointment->reason ?? '-' }}</dd>
        </dl>
    </div>
@endsection
