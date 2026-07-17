@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">{{ $service->name ?? 'Service Details' }}</h3>
                <p class="text-muted mb-0">Clinic service record.</p>
            </div>
            <a href="{{ url('/servies') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <dl class="row mb-0">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $service->id ?? '-' }}</dd>
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $service->name ?? '-' }}</dd>
            <dt class="col-sm-3">Fee</dt>
            <dd class="col-sm-9">{{ isset($service) ? number_format($service->fee, 2) : '-' }}</dd>
            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $service->description ?? '-' }}</dd>
        </dl>
    </div>
@endsection
