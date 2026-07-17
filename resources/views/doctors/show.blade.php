@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">{{ $doctor->name ?? 'Doctor Details' }}</h3>
                <p class="text-muted mb-0">Doctor profile and availability.</p>
            </div>
            <a href="{{ url('/doctors') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <dl class="row mb-0">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $doctor->id ?? '-' }}</dd>
            <dt class="col-sm-3">Phone</dt>
            <dd class="col-sm-9">{{ $doctor->phone ?? '-' }}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ $doctor->email ?? '-' }}</dd>
            <dt class="col-sm-3">Consultation Fee</dt>
            <dd class="col-sm-9">{{ isset($doctor) ? number_format($doctor->consulatation_fee, 2) : '-' }}</dd>
            <dt class="col-sm-3">Available Time</dt>
            <dd class="col-sm-9">{{ $doctor->available_from ?? '-' }} - {{ $doctor->available_to ?? '-' }}</dd>
            <dt class="col-sm-3">Specialization</dt>
            <dd class="col-sm-9">{{ $doctor->specialization->name ?? $doctor->specialization_id ?? '-' }}</dd>
            <dt class="col-sm-3">Services</dt>
            <dd class="col-sm-9">
                {{ isset($doctor) && $doctor->services->isNotEmpty() ? $doctor->services->pluck('name')->join(', ') : '-' }}
            </dd>
        </dl>
    </div>
@endsection
