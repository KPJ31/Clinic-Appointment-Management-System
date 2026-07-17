@extends('layouts.app')

@section('main')
    <div class="card content-card p-4">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h3 class="page-title mb-1">{{ $specialization->name ?? 'Specialization Details' }}</h3>
                <p class="text-muted mb-0">Department record information.</p>
            </div>
            <a href="{{ route('specialIndex') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <dl class="row mb-0">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{ $specialization->id ?? '-' }}</dd>
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ $specialization->name ?? '-' }}</dd>
            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $specialization->description ?? '-' }}</dd>
        </dl>
    </div>
@endsection
